<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousDateOrHourChanged extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;

    /** 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Bonjour, ')
        ->view('emails.rdv-date-or-hour-changed')
        ->with([
            'data' => $this->details,
        ]);
    }
}
