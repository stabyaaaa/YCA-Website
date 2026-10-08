<?php

namespace App\Notifications;

use App\Models\CommunityPost;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CommunityPostStatusNotification extends Notification
{
    use Queueable;


    public CommunityPost $post;

    public string $status;


    public function __construct(
        CommunityPost $post,
        string $status
    ) {
        $this->post = $post;

        $this->status = $status;
    }


    public function via(object $notifiable): array
    {
        return [
            'database',
        ];
    }


    public function toArray(
        object $notifiable
    ): array {

        $message = match ($this->status) {

            'approved' =>
                'Your community post has been approved and published.',

            'scheduled' =>
                'Your community post has been approved and scheduled.',

            'changes_requested' =>
                'Changes have been requested for your community post.',

            'rejected' =>
                'Your community post has been rejected.',

            default =>
                'Your community post status has changed.',

        };


        return [

            'post_id' =>
                $this->post->id,

            'title' =>
                $this->post->title,

            'status' =>
                $this->status,

            'message' =>
                $message,

            'admin_message' =>
                $this->post->admin_message,

        ];
    }
}