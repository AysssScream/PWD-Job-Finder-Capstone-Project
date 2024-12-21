<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewInvitation extends Mailable
{
    use Queueable, SerializesModels;
    
    public $interviewData;

    public function __construct($interviewData)
    {
        $this->interviewData = $interviewData;
    }

    public function build()
    {
        return $this->subject('Interview Invitation from ACCESSIJOBS')
                    ->view('emails.interview-invitation');
    }
}
