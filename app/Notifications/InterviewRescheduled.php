namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class InterviewRescheduled extends Notification
{
    use Queueable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Send both email and in-app notification
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Interview Rescheduled')
            ->line('Your interview has been rescheduled.')
            ->line($this->data['message'])
            ->line('Thank you for your understanding.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->data['message'],
            'interview_id' => $this->data['interview_id']
        ];
    }
}