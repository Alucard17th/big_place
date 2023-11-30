<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{
    //
    public function emails(){
        $user = auth()->user();
        $emails = $user->emails;
        $receivedEmails = Email::where('receiver_id', $user->id)->get();
        return view('candidat.emails.emails', compact('emails', 'receivedEmails'));
    }
}
