<?php
// app/Mail/EmailValidator.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailValidator extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;

    public function __construct(string $subject, string $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.validation') // Ou 'text' se você não tiver uma view
            ->with([
                'subject' => $this->subject,
                'message' => $this->message,
            ]);
    }
}
