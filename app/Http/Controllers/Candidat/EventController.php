<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function events(){
        $user = auth()->user();
        $myEvents = $user->participationEvents;
        $events = Event::all();
        // $events = Event::where('user_id', $user->id)->get();
        return view('candidat.events.index', compact('myEvents', 'events'));
    }

    public function subscribeToEvent($id){
        $user = auth()->user();
        $event = Event::find($id);
    
        // Check if the user is already attached to the event
        if (!$user->participationEvents->contains($event)) {
            // If not, attach the event
            $user->participationEvents()->attach($event);
            toast('Participation effectuée', 'success');
        } else {
            toast('Vous êtes déjà inscrit à cet événement', 'info');
        }
        return redirect()->back();
    }

    public function cancelParticipation($id){
        $user = auth()->user();
        $event = Event::find($id);
        $user->participationEvents()->detach($event);
        
        $events = $user->participationEvents;
        toast('Participation annulee', 'success');
        return redirect()->back();
    }


}
