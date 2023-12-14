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
        $events = $user->events;
        return view('candidat.events.index', compact('events'));
    }
}
