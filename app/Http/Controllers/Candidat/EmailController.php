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
        

        $draftEmails = $emails->where('draft', true)->where('trash', false);
        $deletedEmails = $emails->where('trash', true);
        $emails = $emails->where('trash', false)->where('draft', false);
        $receivedEmails = $receivedEmails->where('trash', false)->where('draft', false);

        $receivers = User::all();
        return view('candidat.emails.index', compact('emails', 'receivedEmails', 'receivers', 'draftEmails', 'deletedEmails'));
    }

    public function create(){
        $receivers = User::all();
        return view('candidat.emails.create', compact('receivers'));
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
       
        toast('Email envoyé', 'success');
        return redirect()->back();
        // return redirect()->back();
    }

    public function draft(Request $request){
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
                'draft' => true,
                // Add other fields as needed
            ]);

            // Assuming you have a relationship set up between Email and User models
           
            $user->emails()->save($email);
        }
       
        toast('Email enregistré dans le brouillon', 'success');
        return redirect()->back();
        // return redirect()->back();
    }

    public function show($id){
        $email = Email::find($id);
        return view('candidat.emails.show', compact('email'));
    }

    public function softDelete($id){
        $email = Email::find($id);
        $email->trash = true;
        $email->save();
        toast('Email supprimé','success')->autoClose(5000);
        return redirect()->back();
    }

    public function delete($id){
        $email = Email::find($id);
        $email->delete();
        toast('Email supprimé','success')->autoClose(5000);
        return redirect()->back();
    }
}
