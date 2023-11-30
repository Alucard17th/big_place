<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidature;

class CandidatureController extends Controller
{
    //
    public function candidatures(){
        $user = auth()->user();
        $candidatures = $user->candidatures;
        return view('candidat.candidatures.candidature', compact('candidatures'));
    }
}
