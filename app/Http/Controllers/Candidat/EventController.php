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
        $events = $user->participationEvents;
        // $events = Event::where('user_id', $user->id)->get();
        return view('candidat.events.index', compact('events'));
    }

    public function cancelParticipation($id){
        $user = auth()->user();
        $event = Event::find($id);
        $user->participationEvents()->detach($event);
        
        $events = $user->participationEvents;
        dd($events);
    }


}
