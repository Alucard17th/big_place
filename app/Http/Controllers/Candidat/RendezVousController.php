<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RendezVous;

class RendezVousController extends Controller
{
    //

    public function rdvs(){
        $user = auth()->user();
        $rdvs = $user->rendezvous;
        return view('candidat.rendez-vous.rendez-vous', compact('rdvs'));
    }
}
