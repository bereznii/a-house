<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallbackRequestCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $callbackRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($callbackRequest)
    {
        $this->callbackRequest = $callbackRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = $this->callbackRequest;

        return $this->subject('Новый запрос на обратный звонок!')->view('emails.callback-request-created', compact('request'));
    }
}
