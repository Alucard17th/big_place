<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller; // Import the Controller class from Laravel
use Illuminate\Http\Request;
use App\Models\Job;

class CandidatController extends Controller
{
    //
    public function dashboard(){
        $user = auth()->user();
        $jobs = Job::all();
        return view('candidat.dashboard', compact('jobs'));
    }

    public function getCandidatRdvs(){
        $user = auth()->user();
        $rdvs = $user->rendezvous;
        return response()->json($rdvs);
    }

    public function getCandidatEvents(){
        $user = auth()->user();
        $events = $user->events;
        return response()->json($events);
    }

    public function getCandidatFormations(){
        $user = auth()->user();
        $formations = $user->formations;
        return response()->json($formations);
    }
}
