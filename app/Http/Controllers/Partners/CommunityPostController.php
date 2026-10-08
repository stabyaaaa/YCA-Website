<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Models\CommunityCategory;
use App\Models\CommunityPost;
use App\Models\CommunityPostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunityPostController extends Controller
{
    /**
     * Partner, Admin and Super Admin can create posts.
     */
    private function authorizeContributor(): void
    {
        abort_unless(
            in_array(
                auth()->user()?->role,
                [
                    'partner',
                    'admin',
                    'super_admin',
                ]
            ),
            403
        );
    }


    /**
     * A user can only manage their own post.
     */
    private function authorizeOwner(
        CommunityPost $post
    ): void {
        abort_unless(
            $post->user_id === auth()->id(),
            403
        );
    }


    /**
     * Check whether logged-in user can publish directly.
     */
    private function canPublishDirectly(): bool
    {
        return in_array(
            auth()->user()?->role,
            [
                'admin',
                'super_admin',
            ]
        );
    }


    /**
     * My Posts page.
     */
    public function index(
        Request $request
    ) {
        $this->authorizeContributor();

        $status = $request->get('status');

        $query = CommunityPost::with([
                'category',
                'media',
                'organization',
            ])
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest();

        if ($status) {

            $allowed = [
                'draft',
                'pending',
                'changes_requested',
                'approved',
                'rejected',
            ];

            if (in_array(
                $status,
                $allowed
            )) {
                $query->where(
                    'status',
                    $status
                );
            }
        }

        $posts = $query
            ->paginate(15)
            ->withQueryString();

        $base = CommunityPost::where(
            'user_id',
            auth()->id()
        );

        $counts = [

            'all' =>
                (clone $base)->count(),

            'draft' =>
                (clone $base)
                    ->where(
                        'status',
                        'draft'
                    )
                    ->count(),

            'pending' =>
                (clone $base)
                    ->where(
                        'status',
                        'pending'
                    )
                    ->count(),

            'changes_requested' =>
                (clone $base)
                    ->where(
                        'status',
                        'changes_requested'
                    )
                    ->count(),

            'approved' =>
                (clone $base)
                    ->where(
                        'status',
                        'approved'
                    )
                    ->count(),

            'rejected' =>
                (clone $base)
                    ->where(
                        'status',
                        'rejected'
                    )
                    ->count(),
        ];

        return view(
            'partner.community.posts.index',
            compact(
                'posts',
                'counts',
                'status'
            )
        );
    }


    /**
     * Create post page.
     */
    public function create()
    {
        $this->authorizeContributor();

        $categories = CommunityCategory::where(
                'is_active',
                true
            )
            ->orderBy('name')
            ->get();

        $pillars = config(
            'community.pillars',
            []
        );

        return view(
            'partner.community.posts.create',
            compact(
                'categories',
                'pillars'
            )
        );
    }


    /**
     * Create new post.
     *
     * Partner:
     * Save as draft.
     *
     * Admin / Super Admin:
     * Publish immediately.
     */
    public function store(
        Request $request
    ) {
        $this->authorizeContributor();

        $validated = $this->validatePost(
            $request
        );

        $canPublishDirectly =
            $this->canPublishDirectly();

        $post = CommunityPost::create([

            'user_id' =>
                auth()->id(),

            'organization_id' =>
                auth()->user()->organization_id,

            'category_id' =>
                $validated['category_id'] ?? null,

            'title' =>
                $validated['title'],

            'body' =>
                $validated['body'],

            'country' =>
                $validated['country'] ?? null,

            'wepower_pillar' =>
                $validated['wepower_pillar'] ?? null,

            'external_url' =>
                $validated['external_url'] ?? null,

            'video_url' =>
                $validated['video_url'] ?? null,


            /*
            |--------------------------------------------------------------------------
            | Partner vs Admin publication behavior
            |--------------------------------------------------------------------------
            */

            'status' =>
                $canPublishDirectly
                    ? 'approved'
                    : 'draft',

            'submitted_at' =>
                $canPublishDirectly
                    ? now()
                    : null,

            'published_at' =>
                $canPublishDirectly
                    ? now()
                    : null,

            'reviewed_by' =>
                $canPublishDirectly
                    ? auth()->id()
                    : null,

            'reviewed_at' =>
                $canPublishDirectly
                    ? now()
                    : null,

            'admin_message' =>
                null,

            'scheduled_at' =>
                null,

        ]);


        $this->storeMedia(
            $request,
            $post
        );


        /*
        |--------------------------------------------------------------------------
        | Admin / Super Admin
        |--------------------------------------------------------------------------
        */

        if ($canPublishDirectly) {

            return redirect()
                ->route(
                    'partner.community.posts.show',
                    $post
                )
                ->with(
                    'success',
                    'Post published successfully.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Partner
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'partner.community.posts.edit',
                $post
            )
            ->with(
                'success',
                'Draft created successfully.'
            );
    }


    /**
     * View own post.
     */
    public function show(
        CommunityPost $post
    ) {
        $this->authorizeContributor();

        $this->authorizeOwner(
            $post
        );

        $post->load([
            'category',
            'media',
            'organization',
            'reviewer',
        ]);

        return view(
            'partner.community.posts.show',
            compact('post')
        );
    }


    /**
     * Edit own post.
     */
    public function edit(
        CommunityPost $post
    ) {
        $this->authorizeContributor();

        $this->authorizeOwner(
            $post
        );


        /*
        |--------------------------------------------------------------------------
        | Partner
        |--------------------------------------------------------------------------
        |
        | Partner may edit:
        | draft
        | changes_requested
        | rejected
        |
        |--------------------------------------------------------------------------
        | Admin / Super Admin
        |--------------------------------------------------------------------------
        |
        | They may edit their own published post too.
        |
        */

        if ($this->canPublishDirectly()) {

            abort_unless(
                in_array(
                    $post->status,
                    [
                        'draft',
                        'approved',
                        'changes_requested',
                        'rejected',
                    ]
                ),
                403,
                'This post cannot currently be edited.'
            );

        } else {

            abort_unless(
                $post->isEditable(),
                403,
                'This post cannot currently be edited.'
            );
        }


        $categories = CommunityCategory::where(
                'is_active',
                true
            )
            ->orderBy('name')
            ->get();

        $pillars = config(
            'community.pillars',
            []
        );

        $post->load(
            'media'
        );

        return view(
            'partner.community.posts.edit',
            compact(
                'post',
                'categories',
                'pillars'
            )
        );
    }


    /**
     * Update own post.
     */
    public function update(
        Request $request,
        CommunityPost $post
    ) {
        $this->authorizeContributor();

        $this->authorizeOwner(
            $post
        );


        if ($this->canPublishDirectly()) {

            abort_unless(
                in_array(
                    $post->status,
                    [
                        'draft',
                        'approved',
                        'changes_requested',
                        'rejected',
                    ]
                ),
                403,
                'This post cannot currently be edited.'
            );

        } else {

            abort_unless(
                $post->isEditable(),
                403,
                'This post cannot currently be edited.'
            );
        }


        $validated = $this->validatePost(
            $request
        );


        $updateData = [

            'category_id' =>
                $validated['category_id'] ?? null,

            'title' =>
                $validated['title'],

            'body' =>
                $validated['body'],

            'country' =>
                $validated['country'] ?? null,

            'wepower_pillar' =>
                $validated['wepower_pillar'] ?? null,

            'external_url' =>
                $validated['external_url'] ?? null,

            'video_url' =>
                $validated['video_url'] ?? null,

        ];


        /*
        |--------------------------------------------------------------------------
        | Admin / Super Admin updates remain published
        |--------------------------------------------------------------------------
        */

        if ($this->canPublishDirectly()) {

            $updateData['status'] =
                'approved';

            $updateData['published_at'] =
                $post->published_at ?? now();

            $updateData['reviewed_by'] =
                auth()->id();

            $updateData['reviewed_at'] =
                now();

            $updateData['admin_message'] =
                null;
        }


        $post->update(
            $updateData
        );


        $this->storeMedia(
            $request,
            $post
        );


        if ($this->canPublishDirectly()) {

            return redirect()
                ->route(
                    'partner.community.posts.show',
                    $post
                )
                ->with(
                    'success',
                    'Post updated successfully.'
                );
        }


        return redirect()
            ->route(
                'partner.community.posts.edit',
                $post
            )
            ->with(
                'success',
                'Post updated successfully.'
            );
    }


    /**
     * Partner submits draft for approval.
     *
     * Admin and Super Admin never use this.
     */
    public function submit(
        CommunityPost $post
    ) {
        $this->authorizeContributor();

        $this->authorizeOwner(
            $post
        );


        /*
        |--------------------------------------------------------------------------
        | Only Partner should submit for moderation
        |--------------------------------------------------------------------------
        */

        abort_unless(
            auth()->user()?->role === 'partner',
            403,
            'Admin and Super Admin posts do not require approval.'
        );


        abort_unless(
            in_array(
                $post->status,
                [
                    'draft',
                    'changes_requested',
                    'rejected',
                ]
            ),
            403,
            'This post cannot currently be submitted.'
        );


        $post->update([

            'status' =>
                'pending',

            'submitted_at' =>
                now(),

            'admin_message' =>
                null,

            'reviewed_by' =>
                null,

            'reviewed_at' =>
                null,

            'published_at' =>
                null,

            'scheduled_at' =>
                null,

        ]);


        return redirect()
            ->route(
                'partner.community.posts.index'
            )
            ->with(
                'success',
                'Post submitted for approval.'
            );
    }


    /**
     * Delete attachment.
     */
    public function deleteMedia(
        CommunityPost $post,
        CommunityPostMedia $media
    ) {
        $this->authorizeContributor();

        $this->authorizeOwner(
            $post
        );


        abort_unless(
            $media->community_post_id === $post->id,
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Editing permissions
        |--------------------------------------------------------------------------
        */

        if (!$this->canPublishDirectly()) {

            abort_unless(
                $post->isEditable(),
                403
            );
        }


        Storage::disk('public')
            ->delete(
                $media->file_path
            );


        $media->delete();


        return back()->with(
            'success',
            'Attachment removed.'
        );
    }


    /**
     * Delete own post.
     */
    public function destroy(
        CommunityPost $post
    ) {
        $this->authorizeContributor();

        $this->authorizeOwner(
            $post
        );


        /*
        |--------------------------------------------------------------------------
        | Partner
        |--------------------------------------------------------------------------
        |
        | Cannot delete pending/approved posts.
        |
        |--------------------------------------------------------------------------
        | Admin / Super Admin
        |--------------------------------------------------------------------------
        |
        | Can delete their own published posts.
        |
        */

        if (!$this->canPublishDirectly()) {

            abort_unless(
                in_array(
                    $post->status,
                    [
                        'draft',
                        'changes_requested',
                        'rejected',
                    ]
                ),
                403
            );
        }


        foreach (
            $post->media
            as $media
        ) {

            Storage::disk('public')
                ->delete(
                    $media->file_path
                );
        }


        $post->delete();


        return redirect()
            ->route(
                'partner.community.posts.index'
            )
            ->with(
                'success',
                'Post deleted successfully.'
            );
    }


    /**
     * Validation.
     */
    private function validatePost(
        Request $request
    ): array {

        return $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'body' => [
                'required',
                'string',
                'max:20000',
            ],

            'category_id' => [
                'nullable',
                'exists:community_categories,id',
            ],

            'country' => [
                'nullable',
                'string',
                'max:100',
            ],

            'wepower_pillar' => [
                'nullable',
                'string',
                'max:150',
            ],

            'external_url' => [
                'nullable',
                'url',
                'max:1000',
            ],

            'video_url' => [
                'nullable',
                'url',
                'max:1000',
            ],

            'attachments' => [
                'nullable',
                'array',
                'max:' . config(
                    'community.max_attachments',
                    5
                ),
            ],

            'attachments.*' => [
                'file',

                'max:' . config(
                    'community.max_file_size',
                    10240
                ),

                'mimes:' . implode(
                    ',',
                    config(
                        'community.allowed_mimes',
                        [
                            'jpg',
                            'jpeg',
                            'png',
                            'webp',
                            'pdf',
                            'doc',
                            'docx',
                        ]
                    )
                ),
            ],

        ]);
    }


    /**
     * Save uploaded media.
     */
    private function storeMedia(
        Request $request,
        CommunityPost $post
    ): void {

        if (!$request->hasFile(
            'attachments'
        )) {
            return;
        }


        $existingCount = $post
            ->media()
            ->count();


        $maxAttachments = config(
            'community.max_attachments',
            5
        );


        $remaining = max(
            0,
            $maxAttachments - $existingCount
        );


        if ($remaining <= 0) {
            return;
        }


        $files = array_slice(
            $request->file(
                'attachments'
            ),
            0,
            $remaining
        );


        foreach (
            $files
            as $index => $file
        ) {

            $path = $file->store(
                'community/posts/' . $post->id,
                'public'
            );


            CommunityPostMedia::create([

                'community_post_id' =>
                    $post->id,

                'file_path' =>
                    $path,

                'file_name' =>
                    $file->getClientOriginalName(),

                'mime_type' =>
                    $file->getMimeType(),

                'file_size' =>
                    $file->getSize(),

                'sort_order' =>
                    $existingCount + $index,

            ]);
        }
    }
}