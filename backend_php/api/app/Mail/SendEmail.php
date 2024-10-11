<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Codigo de confirmação';

    public function __construct($code,$email)
    {
        $this->code = $code;
        $this->email= $email;
    }

    public function build()
    {
        return $this
            ->from('gabrielestevo92@gmail.com')
            ->view('emails.view')
            ->with(['code' => $this->code,'email' => $this->email]); 
    }
}
