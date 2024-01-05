<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class EventController extends Controller
{
    //
    public function events(){
        $user = auth()->user();
        $myEvents = $user->participationEvents;
        $events = Event::where('statut', 'Actif')->get();
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
            $event->registered_participants	= $event->registered_participants + 1;
            if($event->registered_participants == $event->participants_count){
                $event->registration_closed = 1;
            }
            $event->save();
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
        $event->registered_participants = max(0, $event->registered_participants - 1);
        if($event->registered_participants < $event->participants_count){
            $event->registration_closed = 0;
        }
        $event->save();
        // $events = $user->participationEvents;
        toast('Participation annulée', 'success');
        return redirect()->back();
    }

    public function getQrCode($id){
        $event = Event::find($id);
        $qrcode = QrCode::size(100)
        ->generate("EventID:{$event->id}, Organizer:{$event->organizer_name}, Date:{$event->event_date}, Time:{$event->event_hour}");
        // return response()->json($qrcode);
        return Response::make($qrcode, 200, ['Content-Type' => 'image/svg+xml']);

    }

    public function showEvent($id){
        $event = Event::find($id);
        // dd($event);
        return view('candidat.events.show', compact('event'));
    }


}
