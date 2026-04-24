<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends VerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verify Your Email | WePOWER')
            ->greeting('')
            ->line('Thank you for registering with WePOWER.')
            ->line('Please verify your email address to activate your account.')
            ->action('Verify Email', $verificationUrl)
            ->line('If you did not create this account, no further action is required.')
            ->salutation('— WePOWER Team');
    }
}