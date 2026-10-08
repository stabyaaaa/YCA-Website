<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityNotificationController extends Controller
{
    public function index()
    {
        abort_unless(
            auth()->check(),
            401
        );

        $notifications = auth()
            ->user()
            ->notifications()
            ->latest()
            ->paginate(20);

        return view(
            'community.notifications.index',
            compact('notifications')
        );
    }


    public function read(string $notification)
    {
        abort_unless(
            auth()->check(),
            401
        );

        $item = auth()
            ->user()
            ->notifications()
            ->where('id', $notification)
            ->firstOrFail();

        $item->markAsRead();

        if (!empty($item->data['post_id'])) {

            return redirect()->route(
                'partner.community.posts.show',
                $item->data['post_id']
            );
        }

        return back();
    }


    public function readAll()
    {
        abort_unless(
            auth()->check(),
            401
        );

        auth()
            ->user()
            ->unreadNotifications
            ->markAsRead();

        return back()->with(
            'success',
            'All notifications marked as read.'
        );
    }
}