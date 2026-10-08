<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityPost;
use App\Notifications\CommunityPostStatusNotification;
use Illuminate\Http\Request;

class CommunityPostModerationController extends Controller
{
    private function authorizeModerator(): void
    {
        abort_unless(
            in_array(
                auth()->user()?->role,
                [
                    'admin',
                    'super_admin',
                ]
            ),
            403
        );
    }


    private function preventSelfModeration(
        CommunityPost $post
    ): void {

        abort_if(
            $post->user_id === auth()->id(),
            403,
            'You cannot moderate your own post.'
        );
    }


    public function index(Request $request)
    {
        $this->authorizeModerator();

        $status = $request->get(
            'status',
            'pending'
        );


        $allowedStatuses = [
            'pending',
            'changes_requested',
            'approved',
            'rejected',
        ];


        if (!in_array(
            $status,
            $allowedStatuses
        )) {
            $status = 'pending';
        }


        $posts = CommunityPost::with([
                'user',
                'organization',
                'category',
                'media',
            ])
            ->where(
                'status',
                $status
            )
            ->latest(
                'submitted_at'
            )
            ->paginate(20)
            ->withQueryString();


        $counts = [

            'pending' =>
                CommunityPost::where(
                    'status',
                    'pending'
                )->count(),

            'changes_requested' =>
                CommunityPost::where(
                    'status',
                    'changes_requested'
                )->count(),

            'approved' =>
                CommunityPost::where(
                    'status',
                    'approved'
                )->count(),

            'rejected' =>
                CommunityPost::where(
                    'status',
                    'rejected'
                )->count(),

        ];


        return view(
            'admin.community.posts.index',
            compact(
                'posts',
                'status',
                'counts'
            )
        );
    }


    public function show(
        CommunityPost $post
    ) {
        $this->authorizeModerator();


        $post->load([
            'user',
            'organization',
            'category',
            'media',
            'reviewer',
        ]);


        return view(
            'admin.community.posts.show',
            compact('post')
        );
    }


    public function approve(
        CommunityPost $post
    ) {
        $this->authorizeModerator();

        $this->preventSelfModeration(
            $post
        );


        abort_unless(
            in_array(
                $post->status,
                [
                    'pending',
                    'changes_requested',
                    'rejected',
                ]
            ),
            422,
            'This post cannot currently be approved.'
        );


        $post->update([

            'status' =>
                'approved',

            'admin_message' =>
                null,

            'reviewed_by' =>
                auth()->id(),

            'reviewed_at' =>
                now(),

            'scheduled_at' =>
                null,

            'published_at' =>
                now(),

        ]);


        if ($post->user) {

            $post->user->notify(
                new CommunityPostStatusNotification(
                    $post,
                    'approved'
                )
            );

        }


        return redirect()
            ->back()
            ->with(
                'success',
                'Post approved and published successfully.'
            );
    }


    public function requestChanges(
        Request $request,
        CommunityPost $post
    ) {
        $this->authorizeModerator();

        $this->preventSelfModeration(
            $post
        );


        $request->validate([

            'admin_message' => [
                'required',
                'string',
                'max:2000',
            ],

        ]);


        $post->update([

            'status' =>
                'changes_requested',

            'admin_message' =>
                $request->admin_message,

            'reviewed_by' =>
                auth()->id(),

            'reviewed_at' =>
                now(),

            'published_at' =>
                null,

            'scheduled_at' =>
                null,

        ]);


        if ($post->user) {

            $post->user->notify(
                new CommunityPostStatusNotification(
                    $post,
                    'changes_requested'
                )
            );

        }


        return redirect()
            ->back()
            ->with(
                'success',
                'Changes have been requested.'
            );
    }


    public function reject(
        Request $request,
        CommunityPost $post
    ) {
        $this->authorizeModerator();

        $this->preventSelfModeration(
            $post
        );


        $request->validate([

            'admin_message' => [
                'required',
                'string',
                'max:2000',
            ],

        ]);


        $post->update([

            'status' =>
                'rejected',

            'admin_message' =>
                $request->admin_message,

            'reviewed_by' =>
                auth()->id(),

            'reviewed_at' =>
                now(),

            'published_at' =>
                null,

            'scheduled_at' =>
                null,

        ]);


        if ($post->user) {

            $post->user->notify(
                new CommunityPostStatusNotification(
                    $post,
                    'rejected'
                )
            );

        }


        return redirect()
            ->back()
            ->with(
                'success',
                'Post rejected.'
            );
    }


    public function schedule(
        Request $request,
        CommunityPost $post
    ) {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );


        $this->preventSelfModeration(
            $post
        );


        $request->validate([

            'scheduled_at' => [
                'required',
                'date',
                'after:now',
            ],

        ]);


        $post->update([

            'status' =>
                'approved',

            'admin_message' =>
                null,

            'reviewed_by' =>
                auth()->id(),

            'reviewed_at' =>
                now(),

            'scheduled_at' =>
                $request->scheduled_at,

            'published_at' =>
                $request->scheduled_at,

        ]);


        if ($post->user) {

            $post->user->notify(
                new CommunityPostStatusNotification(
                    $post,
                    'scheduled'
                )
            );

        }


        return redirect()
            ->back()
            ->with(
                'success',
                'Post scheduled successfully.'
            );
    }


    public function feature(
        CommunityPost $post
    ) {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );


        abort_unless(
            $post->status === 'approved',
            422,
            'Only approved posts can be featured.'
        );


        $post->update([
            'is_featured' => true,
        ]);


        return back()->with(
            'success',
            'Post featured successfully.'
        );
    }


    public function unfeature(
        CommunityPost $post
    ) {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );


        $post->update([
            'is_featured' => false,
        ]);


        return back()->with(
            'success',
            'Post removed from featured posts.'
        );
    }
}