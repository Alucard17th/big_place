<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->line('Thanks for registering! Before you get started, you must verify your email address by clicking on the link below:')
            ->action('Verify Email Address', $this->getActionUrl($notifiable))
            ->line('If you did not create an account, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    protected function getActionUrl($notifiable)
    {
        // Get the user roles
        $roles = $notifiable->getRoleNames()->toArray();

        // Determine the action URL based on the user roles
        if (in_array('admin', $roles)) {
            return url('/admin/verify/' . $notifiable->getKey() . '/' . $notifiable->getRememberToken());
        } elseif (in_array('user', $roles)) {
            return url('/user/verify/' . $notifiable->getKey() . '/' . $notifiable->getRememberToken());
        }

        // Default to the generic verification URL
        return url('/verify/' . $notifiable->getKey() . '/' . $notifiable->getRememberToken());
    }
    
}
