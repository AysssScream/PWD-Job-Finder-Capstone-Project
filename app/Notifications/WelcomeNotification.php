<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome To AccessiJobs')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Welcome to AccessiJobs!') // First line of the email body
            ->line('Thank you for registering with us.') // Additional line in the email body
            ->action('Get Started', url('/pendingapproval')) // Button text and URL
            ->line('If you have any questions, feel free to reach out.') // Final line in the email body
            ->salutation('Best regards, AccessiJobs Team'); // Salutation at the end of the email
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
