<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lastName;
    public $firstName;
    public $mail;
    public $object;
    public $content;

    /**
     * Create a new message instance.
     *
     * @param $lastName
     * @param $firstName
     * @param $mail
     * @param $object
     * @param $content
     */
    public function __construct($lastName, $firstName, $mail, $object, $content)
    {
        $this->lastName         = $lastName;
        $this->firstName        = $firstName;
        $this->mail             = $mail;
        $this->object           = $object;
        $this->content          = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this ->mail, $this->lastName . ' ' . $this->firstName)
            ->subject($this->object)
            ->markdown('emails.message')
            ->with([
                'content' => $this->content
            ]);
    }
}
