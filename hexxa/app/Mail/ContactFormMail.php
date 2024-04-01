<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.contact_form')
            ->subject('New Contact Form Submission')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'emailMessage' => $this->message, // Renamed $message to $emailMessage
            ]);
    }
}
