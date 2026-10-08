<?php

namespace App\Http\Controllers;

use App\Models\CommunityCategory;
use App\Models\CommunityPost;
use App\Models\CommunityPostBookmark;
use App\Models\CommunityPostReaction;
use App\Models\PartnerOrganization;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Public community feed.
     */
    public function index(Request $request)
    {
        $query = CommunityPost::with([
                'user',
                'organization',
                'category',
                'media',
            ])
            ->where('status', 'approved')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        if ($request->filled('pillar')) {
            $query->where('wepower_pillar', $request->pillar);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        }

        $posts = $query
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->paginate(12)
            ->withQueryString();

        $categories = CommunityCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        $pillars = config('community.pillars', []);

        $countries = CommunityPost::where('status', 'approved')
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view(
            'community.index',
            compact(
                'posts',
                'categories',
                'pillars',
                'countries'
            )
        );
    }


    /**
     * Single public post.
     */
    public function show(CommunityPost $post)
    {
        abort_unless(
            $post->status === 'approved'
            && $post->published_at
            && $post->published_at->lte(now()),
            404
        );

        $post->increment('views_count');

        $post->load([
            'user',
            'organization',
            'category',
            'media',
        ]);

        return view(
            'community.show',
            compact('post')
        );
    }


    /**
     * Like or unlike a post.
     */
    public function toggleLike(CommunityPost $post)
    {
        abort_unless(auth()->check(), 401);

        abort_unless(
            $post->isPublished(),
            404
        );

        $reaction = CommunityPostReaction::where(
                'community_post_id',
                $post->id
            )
            ->where(
                'user_id',
                auth()->id()
            )
            ->first();

        if ($reaction) {
            $reaction->delete();

            CommunityPost::where('id', $post->id)
                ->where('likes_count', '>', 0)
                ->decrement('likes_count');

            return back();
        }

        CommunityPostReaction::create([
            'community_post_id' => $post->id,
            'user_id' => auth()->id(),
            'reaction' => 'like',
        ]);

        $post->increment('likes_count');

        return back();
    }


    /**
     * Save or remove bookmark.
     */
    public function toggleBookmark(CommunityPost $post)
    {
        abort_unless(auth()->check(), 401);

        abort_unless(
            $post->isPublished(),
            404
        );

        $bookmark = CommunityPostBookmark::where(
                'community_post_id',
                $post->id
            )
            ->where(
                'user_id',
                auth()->id()
            )
            ->first();

        if ($bookmark) {
            $bookmark->delete();

            CommunityPost::where('id', $post->id)
                ->where('bookmarks_count', '>', 0)
                ->decrement('bookmarks_count');

            return back();
        }

        CommunityPostBookmark::create([
            'community_post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        $post->increment('bookmarks_count');

        return back();
    }


    /**
     * Track sharing.
     */
    public function share(CommunityPost $post)
    {
        abort_unless(
            $post->isPublished(),
            404
        );

        $post->increment('shares_count');

        return response()->json([
            'success' => true,
            'shares' => $post->fresh()->shares_count,
        ]);
    }


    /**
     * Public organization page.
     */
    public function organization(
        PartnerOrganization $organization
    ) {
        abort_unless(
            $organization->is_active,
            404
        );

        $posts = $organization
            ->posts()
            ->with([
                'category',
                'media',
                'user',
            ])
            ->where('status', 'approved')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(12);

        return view(
            'community.organization',
            compact(
                'organization',
                'posts'
            )
        );
    }


    /**
     * Current user's saved posts.
     */
    public function bookmarks()
    {
        abort_unless(auth()->check(), 401);

        $posts = CommunityPost::whereHas(
                'bookmarks',
                function ($query) {
                    $query->where(
                        'user_id',
                        auth()->id()
                    );
                }
            )
            ->where('status', 'approved')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with([
                'organization',
                'category',
                'media',
                'user',
            ])
            ->latest('published_at')
            ->paginate(12);

        return view(
            'community.bookmarks',
            compact('posts')
        );
    }
}