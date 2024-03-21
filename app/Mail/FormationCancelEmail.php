<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormationCancelEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $formation;
    
    /** 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $formation)
    {
        //
        $this->user = $user;
        $this->formation = $formation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.formation-cancel')
        ->with([
            'user' => $this->user,
            'formation' => $this->formation
        ]);;
    }
}
