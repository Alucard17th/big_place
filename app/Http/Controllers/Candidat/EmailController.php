<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\User;

class EmailController extends Controller
{
    //
    public function emails(){
        $user = auth()->user();
        $emails = $user->emails;
        $receivedEmails = Email::where('receiver_id', $user->id)->get();
        $receivers = User::all();
        return view('candidat.emails.index', compact('emails', 'receivedEmails', 'receivers'));
    }

    public function store(Request $request){
        // Extract data from the request
        $subject = $request->input('subject');
        $message = $request->input('message');
        $receivers = $request->input('receiver');
        $user = auth()->user();
        // Create an Email model for each selected receiver
        foreach ($receivers as $receiverId) {
            $email = new Email([
                'subject' => $subject,
                'message' => $message,
                'receiver_id' => $receiverId,
                // Add other fields as needed
            ]);

            // Assuming you have a relationship set up between Email and User models
           
            $user->emails()->save($email);
        }
       
        toast('Emails envoyés', 'success');
        return redirect()->route('recruiter.mails');
        // return redirect()->back();
    }
}
