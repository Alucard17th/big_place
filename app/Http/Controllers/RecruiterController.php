<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Favorite;
use App\Models\RendezVous;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\SendRdvInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

        $creneau = [
            [
                'time' => 'Le '. $request->crenau_1_date .' | à '. $request->crenau_1_time
            ],
            [
                'time' => 'Le '. $request->crenau_2_date .' | à '. $request->crenau_2_time
            ],
            [
                'time' => 'Le '. $request->crenau_3_date .' | à '. $request->crenau_3_time
            ]
        ];

        $message_body = 'Nous espérons que ce message vous trouve en pleine forme. Nous sommes ravis de poursuivre votre candidature et aimerions vous inviter à un entretien pour discuter de vos qualifications et de votre potentiel d\'intégration au sein de notre équipe.
                        Pour convenir à votre emploi du temps, nous vous proposons trois créneaux horaires disponibles pour votre entretien. Veuillez examiner les options ci-dessous et nous faire part de votre choix préféré :';
        
        $confirmationUrl = '';
        $emailDetails = [
            'title' => 'Proposition rendez-vous',
            'body' => $message_body,
            'creneau' => $creneau
        ];
        
        Mail::to('eddallal.noureddine@gmail.com')->send(new SendRdvInvitation($emailDetails));
        // // Send Emails TO all the participant 
        // foreach($participants as $participant){
            
        // }

        toast('Les invitations ont bien été envoyées.','success')->autoClose(5000);
        // return json success
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function myRdv(){
        $user = auth()->user();
        $rdvs = $user->rendezvous;
        return view('recruiter.rendez-vous.rendez-vous', compact('rdvs'));
    }

    public function seeMyRdv($id){
        $rdv = RendezVous::find($id);
        return view('recruiter.rendez-vous.edit', compact('rdv'));
    }

    public function myDocuments(){
        $user = auth()->user();
        $documents = $user->documents;
        return view('recruiter.documents', compact('documents'));
    }

    public function addDocument(Request $request){
        // Get the user ID, assuming you have authentication in place
        $user = auth()->user();
        $userId = auth()->user()->id;

        // Get the uploaded file
        $file = $request->file('document');

        // Generate a unique filename
        $fileName = $userId . '-' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the user's directory within the storage/app/public directory
        $filePath = $file->storeAs('public/' . $userId, $fileName);

        $user->documents()->create([
            'name' => $fileName,
            'file' => $filePath
        ]);

        toast('Votre document a bien été ajouté','success')->autoClose(5000);

        return redirect()->back();
    }

    public function addCommentaire(Request $request){
        $rdv = RendezVous::find($request->rdv_id);
        $rdv->commentaire = $request->commentaire;
        $rdv->save();

        toast('Votre commentaire a bien été ajouté','success')->autoClose(5000);
        return redirect()->back();
    }

    public function myJobOffers(){

        return view('recruiter.offres.offres');
    }

    public function myVitrine(){
        $user = auth()->user();
        $entreprise = $user->entreprise->first();
        return view('recruiter.vitrine.vitrine', compact('entreprise'));
    }
}
