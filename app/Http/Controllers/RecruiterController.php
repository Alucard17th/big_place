<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Favorite;
use App\Models\RendezVous;
use RealRashid\SweetAlert\Facades\Alert;
class RecruiterController extends Controller
{
    //

    public function cvtheque(){
        $curriculums = Curriculum::all();
        return view('recruiter.cvtheque', compact('curriculums'));
    }

    public function cvthequeSearch(Request $request){
        $searchTerm = $request->all();

        // Create a query builder instance
        $query = Curriculum::query();

        // Apply search conditions for each field
        if (!empty($searchTerm['metier_recherche'])) {
            $query->where('metier_recherche', 'like', '%' . $searchTerm['metier_recherche'] . '%');
        }
        if (!empty($searchTerm['ville_domiciliation'])) {
            $query->where('ville_domiciliation', 'like', '%' . $searchTerm['ville_domiciliation'] . '%');
        }
        if (!empty($searchTerm['annees_experience'])) {
            $query->where('annees_experience', 'like', '%' . $searchTerm['annees_experience'] . '%');
        }
        if (!empty($searchTerm['niveau_etudes'])) {
            $query->where('niveau_etudes', 'like', '%' . $searchTerm['niveau_etudes'] . '%');
        }
        if (!empty($searchTerm['pretentions_salariales'])) {
            $query->where('pretentions_salariales', 'like', '%' . $searchTerm['pretentions_salariales'] . '%');
        }
        if (!empty($searchTerm['valeur'])) {
            $query->where('valeurs->valeur', 'like', '%' . $searchTerm['valeur'] . '%');
        }

        $curriculums = $query->get();
        return view('recruiter.cvtheque', compact('curriculums'));
    }

    public function cvthequeAddFavorite(Request $request){
        // create or update Favorite based on the auth user id as user_id in Favorite model
        $favorite = Favorite::where('user_id', auth()->user()->id)->first();
        if ($favorite) {
            $favorite->favorites = json_encode($request->selectedValues);
            $favorite->save();
        }else{
            $favorite = new Favorite();
            $favorite->user_id = auth()->user()->id;
            $favorite->favorites = json_encode($request->selectedValues);
            $favorite->save();
        }
       
        // Alert::success('Favoris ajouté', 'Les favoris ont bien été ajoutés.');
        toast('Les favoris ont bien été ajoutés.','success')->autoClose(5000);
        // return a json success response 
        return response()->json([
            'status' => 'success',
        ]);
        // return redirect()->back();
    }

    public function myFavorites(){
        $user = auth()->user();
        $user->favorites();
        $favoriteIds = json_decode($user->favorites()->pluck('favorites')->first(), true);
        $favorites = Curriculum::whereIn('id', $favoriteIds)->get();
        
        return view('recruiter.favorites', compact('favorites'));
    }

    public function inviteCandidates(Request $request){
        $participants = json_decode($request->selectedValues);
        foreach($participants as $participant){
            $rdv_1 = RendezVous::create([
                'user_id' => auth()->user()->id,
                'participant' => $participant,
                'date' => $request->crenau_1_date,
                'heure' => $request->crenau_1_time,
                'status' => 'En attente'
            ]);
    
            $rdv_2 = RendezVous::create([
                'user_id' => auth()->user()->id,
                'participant' => $participant,
                'date' => $request->crenau_2_date,
                'heure' => $request->crenau_2_time,
                'status' => 'En attente'
            ]);
    
            $rdv_3 = RendezVous::create([
                'user_id' => auth()->user()->id,
                'participant' => $participant,
                'date' => $request->crenau_3_date,
                'heure' => $request->crenau_3_time,
                'status' => 'En attente'
            ]);
        }
       
        toast('Les invitations ont bien été envoyées.','success')->autoClose(5000);
        // return json success
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function myRdv(){
        $user = auth()->user();
     
        $rdvs = $user->rendezvous;
        return view('recruiter.rendez-vous', compact('rdvs'));
    }
}
