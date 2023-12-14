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
        $rdvs = RendezVous::where('candidat_it', $user->id)->get();
        return view('candidat.rendez-vous.rendez-vous', compact('rdvs'));
    }

    public function cancelRdv($id){
        $rdv = RendezVous::find($id);
        $rdv->status = 'Annulé';
        $rdv->save();
        toast('Rendez-vous annulé','success')->autoClose(5000);
        return redirect()->back();
    }

   
}
