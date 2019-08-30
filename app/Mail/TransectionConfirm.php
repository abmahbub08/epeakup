<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransectionConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@epeakup.com','Epeakup')->subject('Confirmation')
                    ->markdown('email.transection.confirmation');
    }
}
