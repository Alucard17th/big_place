<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\Offre;
use App\Models\User;
use App\Models\Entreprise;
use App\Models\History;
use Carbon\Carbon;

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
        $data = [
            'offre' => $offre,
            'entreprise' => Entreprise::where('user_id', $offre->user_id)->first(),
        ];
        return response()->json($data);
    }

    public function apply($id){
        $offer = Offre::find($id);
        // update the user->history 
        $user = auth()->user();
        $existingRecord = History::where('user_id', $user->id)
        ->where('searchable', $offer->id)
        ->where('created_at', '>', Carbon::now()->subDay())
        ->first();
        if (!$existingRecord) {
            $history = new History();
            $history->user_id = $user->id;
            $history->searchable = $offer->id;
            $history->save();
        }
        
        return view('candidat.favorites.apply', compact('offer'));
    }

    public function vitrineShow($id){
        $user = User::find($id);
        $entreprise = $user->entreprise->first();
        $offres = Offre::where('user_id', $id)->get();
        // dd($offres);
        return view('candidat.favorites.vitrine', compact('entreprise', 'offres'));
    }

    public function store(Request $request){
        $candidature = new Candidature();
        $candidature->status = 'coming';
        $candidature->user_id = $request->entreprise_owner_id;
        $candidature->title = $request->title;
        $candidature->candidat_id = auth()->user()->id;
        $candidature->offer_id = $request->offer_id;
        $candidature->save();

        toast('Candidature envoyée','success')->autoClose(5000);
        return redirect()->back();
    }
   
}
