<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\Offre;

class CandidatureController extends Controller
{
    //
    public function candidatures(){
        $user = auth()->user();
        $candidatures = Candidature::where('candidat_id', $user->id)->get();
        return view('candidat.candidatures.candidature', compact('candidatures'));
    }

    public function jsonShow($id)
    {
        $candidature = Candidature::find($id);
        $offre = Offre::find($candidature->offer_id);
        return response()->json($offre);
    }
}
