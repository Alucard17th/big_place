<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Thread;
use App\Models\User;
use App\Models\Entreprise;

class ThreadController extends Controller
{
    //
    public function index(){
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $threads = $user->threads->where('draft', false);
            $receivedThreads = Thread::where('participant_id', $user->id)->orderBy('created_at', 'desc')->get();
            $draftThreads = $user->threads->where('draft', true);
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $threads = $entreprise->user->threads->where('draft', false);
            $receivedThreads = Thread::where('participant_id', $entreprise->user->id)->orderBy('created_at', 'desc')->get();
            $draftThreads = $user->threads->where('draft', true);
        }

        // $deletedEmails = $emails->where('trash', true);
     
        // if($deletedEmails->count() >= 20){
        //     toast('Vous avez atteint la limite de 20 mails supprimés, veuillez vider votre corbeille.','error')->autoClose(5000);
        // }

        return view('recruiter.threads.index', compact('threads', 'receivedThreads', 'draftThreads'));
    }

    public function show($id){
        $user = auth()->user();
        $thread = Thread::find($id);
        $thread->emails()->where('receiver_id', $user->id)->update(['is_read' => true]);
        return view('recruiter.threads.show', compact('thread'));
    }
  
    public function create(){
        $user = auth()->user();
        $receivers = User::all()->where('id', '!=', $user->id);
        return view('recruiter.threads.create', compact('receivers'));
    }

    public function store(Request $request){
        // Extract data from the request
        $subject = $request->input('subject');
        $message = $request->input('message');
        $receivers = $request->input('receiver');
        $user = auth()->user();
        // Create an Email model for each selected receiver
        foreach ($receivers as $receiverId) {
            $thread = new Thread();
            $thread->user_id = $user->id;
            $thread->participant_id = $receiverId;
            $thread->save();

            $email = new Email([
                'subject' => $subject,
                'message' => $message,
                'receiver_id' => $receiverId,
                'thread_id' => $thread->id,
                // Add other fields as needed
            ]);

            // Assuming you have a relationship set up between Email and User models
            $user->emails()->save($email);
        }
    
        toast('Email envoyé', 'success');
        
        // if($user->getRoleNames()->contains('candidat')){
        //     return redirect()->route('candidat.emails');
        // }else{
        //     return redirect()->route('recruiter.mails');
        // }
        return redirect()->route('recruiter.mails');
    }

    public function storeAsDraft(Request $request){
        // Extract data from the request
        $subject = $request->input('subject');
        $message = $request->input('message');
        $receivers = $request->input('receiver');
        $user = auth()->user();
        // Create an Email model for each selected receiver
        foreach ($receivers as $receiverId) {
            $thread = new Thread();
            $thread->user_id = $user->id;
            $thread->participant_id = $receiverId;
            $thread->draft = true;
            $thread->save();

            $email = new Email([
                'subject' => $subject,
                'message' => $message,
                'receiver_id' => $receiverId,
                'thread_id' => $thread->id,
                // Add other fields as needed
            ]);

            // Assuming you have a relationship set up between Email and User models
            $user->emails()->save($email);
        }
    
        toast('Email envoyé', 'success');
        
        // if($user->getRoleNames()->contains('candidat')){
        //     return redirect()->route('candidat.emails');
        // }else{
        //     return redirect()->route('recruiter.mails');
        // }
        return redirect()->back();
        // return redirect()->back();
    }

    public function reply(Request $request){
        // dd($request->all());
        // Extract data from the request
        $subject = $request->input('subject');
        $message = $request->input('message');
        $receiverId = $request->input('receiver_id');
        $threadId = $request->input('thread_id');
        $user = auth()->user();

        // Create an Email model for each selected receiver
        $email = new Email([
            'subject' => $subject,
            'message' => $message,
            'receiver_id' => $receiverId,
            'thread_id' => $threadId,
            // Add other fields as needed
        ]);

        // Assuming you have a relationship set up between Email and User models
        $user->emails()->save($email);
       
        toast('Réponse envoyé', 'success');
        
        // if($user->getRoleNames()->contains('candidat')){
        //     return redirect()->route('candidat.emails');
        // }else{
        //     return redirect()->route('recruiter.mails');
        // }
        return redirect()->back();
        // return redirect()->back();
    }

}