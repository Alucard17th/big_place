<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Favorite;
use App\Models\RendezVous;
use App\Models\Entreprise;
use App\Models\Task;
use App\Models\Offre;
use App\Models\Job;
use App\Models\Event;
use App\Models\Formation;
use App\Models\Email;
use App\Models\Candidature;
use App\Models\History;
use App\Models\User;
use App\Models\Document;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\SendRdvInvitation;
use App\Mail\EntrepriseRdvInvitation;
use App\Mail\RendezVousDateOrHourChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Facades\Filepond;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Vues;

class RecruiterController extends Controller
{   

    // DASHBOARD
    public function dashboard(){
        $jobs = Job::all();
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $entreprise = $user->entreprise->first();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
        }
        $entrepriseViews = $entreprise->vues;

        $vuesByDay = Vues::where('viewable_id', $entreprise->id)
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get();
        $vuesByWeek = Vues::where('viewable_id', $entreprise->id)
        ->select(DB::raw('YEARWEEK(created_at) as week'), DB::raw('COUNT(*) as count'))
        ->groupBy('week')
        ->orderBy('week', 'desc')
        ->get();
        foreach($vuesByWeek as $key => $value){
            $year = substr($value->week, 0, 4);
            $week = substr($value->week, -2);
            // $weekStart = Carbon::createFromIsoWeekYear($year, $week);
            // Start with the first day of the year
            $date = Carbon::createFromDate(2023, 1, 1);

            // Move to the desired ISO week
            $weekStart = $date->setISODate($year, $week);
            $weekEnd = $weekStart->addDays(6);

        }
        $vuesByMonth = Vues::where('viewable_id', $entreprise->id)
        ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
        ->groupBy('month', 'year')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();
        // dd($vuesByDay, $vuesByWeek, $vuesByMonth);
        // dd($jobs);
        return view('recruiter.dashboard', compact('jobs', 'entrepriseViews', 'vuesByDay', 'vuesByWeek', 'vuesByMonth'));
    }
    public function getJobsJson(){
        $page = request('page', 1); // Get page number from request
        $perPage = 20; // Adjust as needed

        $jobs = Job::paginate($perPage, ['*'], 'page', $page);
        return response()->json([
            'items' => $jobs->items(),
            'total_count' => $jobs->total(),
        ]);
    }
    public function searchJobsJson(){
        $term = trim(request('q'));

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Job::where('full_name', 'like', '%' . $term . '%')->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->full_name, 'text' => $tag->full_name];
        }

        return \Response::json($formatted_tags);
    }
    public function searchJobsJsonCandidatProfil(){
        $term = trim(request('q'));

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Job::where('full_name', 'like', '%' . $term . '%')->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->full_name, 'text' => $tag->full_name];
        }

        return \Response::json($formatted_tags);
    }
    // CV THEQUE
    public function cvtheque(){
        // $user = auth()->user();

        // if($user->parent_entreprise_id == null){
        //     // USER IS ADMIN
        //     $curriculums = Curriculum::where('user_id', $user->id)->get();
        // }else{
        //     // OTHER TEAM MEMBERS
        //     $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
        //     $curriculums = Curriculum::where('user_id', $entreprise->user_id)->get();
        // }
        $curriculums = Curriculum::all();
        $jobs = Job::all();
        return view('recruiter.cvtheque', compact('curriculums', 'jobs'));
    }
    // public function cvthequeSearch(Request $request){
    //     $searchTerm = $request->all();

    //     // Create a query builder instance
    //     $query = Curriculum::query();
    //     // $score = 0;

    //     // Apply search conditions for each field
    //     // if (!empty($searchTerm['metier_recherche']) && $searchTerm['metier_recherche'] != '') {
    //     //     $query->where('metier_recherche', 'like', '%' . $searchTerm['metier_recherche'] . '%');
    //     //     $score += $query->count() > 0 ? 10 : 0;
    //     //     echo $query->count() > 0 ? 10 : 0;
    //     // }
    //     // if (!empty($searchTerm['ville_domiciliation']) && $searchTerm['ville_domiciliation'] != '') {
    //     //     $query->where('ville_domiciliation', 'like', '%' . $searchTerm['ville_domiciliation'] . '%')
    //     //     ->orWhere('address', 'like', '%' . $searchTerm['ville_domiciliation'] . '%');
    //     //     $score += $query->count() > 0 ? 10 : 0;
    //     //     echo $query->count() > 0 ? 10 : 0;
    //     // }
    //     // if (!empty($searchTerm['annees_experience']) && $searchTerm['annees_experience'] != '') {
    //     //     $query->where('annees_experience', 'like', '%' . $searchTerm['annees_experience'] . '%');
    //     //     $score += $query->count() > 0 ? 10 : 0;
    //     //     echo $query->count() > 0 ? 10 : 0;
    //     // }
    //     // if (!empty($searchTerm['niveau_etudes']) && $searchTerm['niveau_etudes'] != '') {
    //     //     $query->where('niveau_etudes', 'like', '%' . $searchTerm['niveau_etudes'] . '%');
    //     //     $score += $query->count() > 0 ? 10 : 0;
    //     //     echo $query->count() > 0 ? 10 : 0;
    //     // }
    //     // if (!empty($searchTerm['pretentions_salariales']) && $searchTerm['pretentions_salariales'] != '') {
    //     //     $query->where('pretentions_salariales', 'like', '%' . $searchTerm['pretentions_salariales'] . '%');
    //     //     $score += $query->count() > 0 ? 10 : 0;
    //     //     echo $query->count() > 0 ? 10 : 0;
    //     // }
    //     // if (!empty($searchTerm['valeurs']) && $searchTerm['valeurs'] != '') {
    //     //     $query->where(function ($query) use ($searchTerm) {
    //     //         $query->orWhereJsonContains('valeurs', $searchTerm['valeurs']);
    //     //     });
    //     //     $score += $query->count() > 0 ? 10 : 0;
    //     //     echo $query->count() > 0 ? 10 : 0;
    //     // }

        

    //     // $curriculums = $query->get();
    //     // $total_possible_score = 60;
    //     // foreach ($curriculums as $curriculum) {
    //     //     $curriculum->matching_percentage = ($score / $total_possible_score) * 100;
    //     // }

    //     dd($curriculums);

    //     $jobs = Job::all();

    //     return view('recruiter.cvtheque', compact('curriculums', 'jobs'));
    // }
    public function cvthequeSearch(Request $request)
    {
        $searchTerm = $request->all();
        
        // Create a query builder instance
        $query = Curriculum::query();
        
        // Execute the query and get the results
        $curriculums = $query->get();
        
        $total_possible_score = 70;

        // Calculate the matching percentage for each result
        foreach ($curriculums as $curriculum) {
            $score = 0; // Initialize score for each curriculum

            // Apply search conditions for each field
            if (!empty($searchTerm['metier_recherche']) && $searchTerm['metier_recherche'] != '') {
                $score += strpos($curriculum->metier_recherche, $searchTerm['metier_recherche']) !== false ? 10 : 0;
            }
            if (!empty($searchTerm['custom_job']) && $searchTerm['custom_job'] != '') {
                $score += strpos($curriculum->metier_recherche, $searchTerm['custom_job']) !== false ? 10 : 0;
            }
            if (!empty($searchTerm['ville_domiciliation']) && $searchTerm['ville_domiciliation'] != '') {
                $score += (strpos($curriculum->ville_domiciliation, $searchTerm['ville_domiciliation']) !== false ||
                        strpos($curriculum->address, $searchTerm['ville_domiciliation']) !== false) ? 10 : 0;
            }
            if (!empty($searchTerm['annees_experience']) && $searchTerm['annees_experience'] != '') {
                $score += strpos($curriculum->annees_experience, $searchTerm['annees_experience']) !== false ? 10 : 0;
            }
            if (!empty($searchTerm['niveau_etudes']) && $searchTerm['niveau_etudes'] != '') {
                $score += strpos($curriculum->niveau_etudes, $searchTerm['niveau_etudes']) !== false ? 10 : 0;
            }
            if (!empty($searchTerm['pretentions_salariales']) && $searchTerm['pretentions_salariales'] != '') {
                $score += strpos($curriculum->pretentions_salariales, $searchTerm['pretentions_salariales']) !== false ? 10 : 0;
            }
            if (!empty($searchTerm['valeurs']) && $searchTerm['valeurs'] != '') {
                $score += in_array($searchTerm['valeurs'], json_decode($curriculum->valeurs, true)) ? 10 : 0;
            }

            // Calculate the matching percentage for the current curriculum
            $curriculum->matching_percentage = ($score / $total_possible_score) * 100;
        }


        $jobs = Job::all();
        $isSearch = true;
        $curriculums = $curriculums->sortByDesc('matching_percentage');

        // Filter out offers with a matching percentage of 0
        $curriculums = $curriculums->filter(function ($curriculum) {
            return $curriculum->matching_percentage > 0;
        });

        return view('recruiter.cvtheque', compact('curriculums', 'jobs', 'isSearch'));
    }

    // FAVORIS
    public function cvthequeAddFavorite(Request $request){
        // create or update Favorite based on the auth user id as user_id in Favorite model
        $favorite = Favorite::where('user_id', auth()->user()->id)->first();
        // dd(json_decode($favorite->favorites), $request->selectedValues);
        if ($favorite) {
            // update favorite
            // $favsMerged = array_merge( json_decode($favorite->favorites), $request->selectedValues);
            $favsMerged = array_unique(array_merge(json_decode($favorite->favorites), $request->selectedValues));
            $favorite->favorites = $favsMerged;
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
        // $favoriteIds = json_decode($user->favorites()->pluck('favorites')->first(), true);
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $favoriteIds = json_decode($user->favorites->pluck('favorites')->first(), true) ?? [];
            $favorites = Curriculum::whereIn('id', $favoriteIds)->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $favoriteIds = json_decode($entreprise->user->favorites->pluck('favorites')->first(), true) ?? [];
            $favorites = Curriculum::whereIn('id', $favoriteIds)->get();
        }
        
        return view('recruiter.favorites', compact('favorites'));
    }
    public function inviteCandidates(Request $request){
        $participants = json_decode($request->selectedValues);
        $errors = [];
        $user = auth()->user();

         
        $existingRendezVous = $user->rendezvous()
        ->where('date', $request->crenau_2_date)
        ->where('heure', $request->crenau_2_time)
        ->first();
        if ($existingRendezVous) {
            // Collect error for this index
            $errors[0] = 'Il existe déjà un rendez-vous à cette date et heure';
        }
        // check if there is a Rendez-Vous already created with one of the creneau date and time selected in the request 
        $existingRendezVous = $user->rendezvous()
        ->where('date', $request->crenau_1_date)
        ->where('heure', $request->crenau_1_time)
        ->first();
        if ($existingRendezVous) {
            // Collect error for this index
            $errors[1] = 'Il existe déjà un rendez-vous à cette date et heure';
        }
       

        $existingRendezVous = $user->rendezvous()
        ->where('date', $request->crenau_3_date)
        ->where('heure', $request->crenau_3_time)
        ->first();
        if ($existingRendezVous) {
            // Collect error for this index
            $errors[2] = 'Il existe déjà un rendez-vous à cette date et heure';
        }

        if (!empty($errors)) {
            // Handle errors, for example, return a response with error messages
            return response()->json([
                'status' => 'error',
                'errors' => $errors,
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

        // $message_body = 'Nous espérons que ce message vous trouve en pleine forme. Nous sommes ravis de poursuivre votre candidature et aimerions vous inviter à un entretien pour discuter de vos qualifications et de votre potentiel d\'intégration au sein de notre équipe.
        //                 Pour convenir à votre emploi du temps, nous vous proposons trois créneaux horaires disponibles pour votre entretien. Veuillez examiner les options ci-dessous et nous faire part de votre choix préféré :';

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $entreprise = $user->entreprise->first();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
        }

        $message_body = 'une proposition de RDV vous a été envoyée par l’entreprise '.$entreprise->nom_entreprise.', 
        vous avez 24H pour valider le RDV, passé ce délai, l’entreprise pourra proposer ce RDV a un autre candidat';
        
        $confirmationUrl = '';

        $rdv_1 = RendezVous::create([
            'user_id' => auth()->user()->id,
            // 'participant' => $participant,
            'date' => $request->crenau_1_date,
            'heure' => $request->crenau_1_time,
            'address' => $request->address,
            'status' => 'En attente',
            'is_type_presentiel' => $request->is_type_presentiel == 'true' ? 1 : 0,
            'is_type_distanciel' => $request->is_type_distanciel == 'true' ? 1 : 0
        ]);

        $rdv_2 = RendezVous::create([
            'user_id' => auth()->user()->id,
            // 'participant' => $participant,
            'date' => $request->crenau_2_date,
            'heure' => $request->crenau_2_time,
            'address' => $request->address,
            'status' => 'En attente',
            'is_type_presentiel' => $request->is_type_presentiel == 'true' ? 1 : 0,
            'is_type_distanciel' => $request->is_type_distanciel == 'true' ? 1 : 0
        ]);

        $rdv_3 = RendezVous::create([
            'user_id' => auth()->user()->id,
            // 'participant' => $participant,
            'date' => $request->crenau_3_date,
            'heure' => $request->crenau_3_time,
            'address' => $request->address,
            'status' => 'En attente',
            'is_type_presentiel' => $request->is_type_presentiel == 'true' ? 1 : 0,
            'is_type_distanciel' => $request->is_type_distanciel == 'true' ? 1 : 0
        ]);

        $emailDetails = [
            'title' => 'Proposition de rendez-vous.',
            'body' => $message_body,
            'creneau' => $creneau,
            'confirmationUrl' => $confirmationUrl,
            'rdvs' =>[
                $rdv_1->id,
                $rdv_2->id,
                $rdv_3->id
            ],
            'type' => $request->is_type_presentiel == 'true' ? 'Présentiel' : 'Distanciel',
            'address' => $request->address != '' ? $request->address : 'A distance'
        ];

        $recipientsData = [];
        foreach($participants as $participant){
            // Send Emails TO all the participant 
            $recipient = User::find($participant);
            Mail::to($recipient->email)->send(new SendRdvInvitation($emailDetails));
            $email = Email::create([
                'user_id' => auth()->user()->id,
                'subject' => 'Rendez-vous',
                'message' => $message_body,
                'receiver_id' => $participant,
            ]);

            $recipientsData[] = [
                'name' => $recipient->name
            ];
        }

        $entrepriseEmailDetails = [
            'title' => 'Proposition de rendez-vous.',
            'participants' => $recipientsData,
            'creneau' => $creneau,
            'rdvs' =>[
                $rdv_1->id,
                $rdv_2->id,
                $rdv_3->id
            ],
            'type' => $request->is_type_presentiel == 'true' ? 'Présentiel' : 'Distanciel',
            'address' => $request->address != '' ? $request->address : 'A distance'
        ];

        Mail::to($user->email)->send(new EntrepriseRdvInvitation($entrepriseEmailDetails));

        return response()->json([
            'status' => 'success',
        ]);
    }

    // RDV
    public function myRdv(){
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $rdvs = $user->rendezvous()->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $rdvs = $entreprise->user->rendezvous()->get();
        }

        return view('recruiter.rendez-vous.rendez-vous', compact('rdvs'));
    }
    public function seeMyRdv($id){
        $rdv = RendezVous::find($id);
        return view('recruiter.rendez-vous.edit', compact('rdv'));
    }
    public function updateMyRdv(Request $request){
        $rdv = RendezVous::find($request->rdv_id);
        $oldDate = $rdv->date;
        $oldTime = $rdv->heure;

        $rdv->date = $request->date;
        $rdv->heure = $request->heure;
        $rdv->status = $request->status;
        $rdv->commentaire = $request->commentaire;
        $rdv->save();

        $recipient = $rdv->participant;
        $participant = User::find($recipient);
        // Check if the old date or old time have been changed
        if ($oldDate != $request->date || $oldTime != $request->heure) {
            // Send an email here
            $emailData = [
                'date' => $request->date,
                'time' => $request->heure,
                'title' => 'Rendez-vous modifié.',
                'body' => 'Votre rendez-vous du '.$oldDate.' à '.$oldTime.' a été modifié pour le '.$request->date.' à '.$request->heure.' .',

            ];
            Mail::to($participant->email)->send(new RendezVousDateOrHourChanged($emailData));
            // Example: Mail::to($rdv->participant->email)->send(new YourEmailClass($rdv));
        }

        toast('Votre rendez-vous a bien été mis a jour, le candidat recevra une notification.','success')->autoClose(5000);

        return redirect()->back();
    }
    public function cancelMyRdv($id){
        $rdv = RendezVous::find($id);
        $rdv->status = 'Annulé';
        $rdv->save();

        toast('Rendez-vous annule','success')->autoClose(5000);
        return redirect()->back();
    }

    // DOCUMENTS
    public function myDocuments(){
        $user = auth()->user();
        
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $documents = $user->documents()->where('type', 'document')->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $documents = $entreprise->user->documents()->where('type', 'document')->get();
        }
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
            'file' => $filePath,
            'type' => 'document',
            'label' => $request->label,
        ]);

        toast('Votre document a bien été ajouté','success')->autoClose(5000);

        return redirect()->back();
    }
    public function addCommentaire(Request $request){
        $rdv = RendezVous::find($request->rdv_id);
        $rdv->commentaire = $request->commentaire;
        $rdv->save();

        toast('Votre commentaire a bien été ajouté','success')->autoClose(5000);
        // return redirect()->back();
        return response()->json([
            'status' => 'success',
        ]);
    }
    public function deleteDocument($id){
        $document = Document::find($id);
        $document->delete();
        toast('Votre document a bien été supprimé','success')->autoClose(5000);
        return redirect()->back();
    }

    // VITRINE
    public function myVitrine(){
        $user = auth()->user();
        $entreprise = $user->entreprise->first();
        return view('recruiter.vitrine.vitrine', compact('entreprise'));
    }
    public function updateVitrine(Request $request){
        $user = auth()->user();
        // $user->entreprise()->update([
        //     'nom_entreprise' => $request->nom_entreprise,
        //     'date_creation' => $request->date_creation,
        //     'domiciliation' => $request->domiciliation,
        //     'siege_social' => $request->siege_social,
        //     'valeurs_fortes' => $request->valeurs_fortes,
        //     'nombre_implementations' => $request->nombre_implementations,
        //     'effectif' => $request->effectif,
        //     'fondateurs' => $request->fondateurs,
        //     'chiffre_affaire' => $request->chiffre_affaire
        // ]);

        $user->entreprise()->updateOrCreate(
            ['user_id' => $user->id], // Assuming 'user_id' is the foreign key linking the user and entreprise tables
            [
                'nom_entreprise' => $request->nom_entreprise,
                'date_creation' => $request->date_creation,
                'domiciliation' => $request->domiciliation,
                'siege_social' => $request->siege_social,
                'valeurs_fortes' => $request->valeurs_fortes,
                'nombre_implementations' => $request->nombre_implementations,
                'effectif' => $request->effectif,
                'fondateurs' => $request->fondateurs,
                'chiffre_affaire' => $request->chiffre_affaire
            ]
        );

        $userId = auth()->user()->id;
        $entreprise = Entreprise::where('user_id', $userId)->first();

      
        if($request->has('cover') && $request->cover != null) {
            $fileInfos = Filepond::field($request->cover)->moveTo('/uploads/'.$userId.'/cover_'.uniqid());
            $entreprise->cover = $fileInfos['location'];
        }

        if($request->has('logo')) {
            $fileInfos = Filepond::field($request->logo)->moveTo('/uploads/'.$userId.'/logo_'.uniqid());
            $entreprise->logo = $fileInfos['location'];
        }

        if($request->has('video')) {
            $fileInfos = Filepond::field($request->video)->moveTo('/uploads/'.$userId.'/video_'.uniqid());
            // dd($fileInfos['location']);
            $entreprise->video = $fileInfos['location'];
        }

        if ($request->has('photos_locaux')) {
            $photosLocaux = $entreprise->photos_locaux;
            if (!is_array($photosLocaux)) {
                $photosLocaux = [];
            }
            $newFilePaths = [];

            foreach ($request->photos_locaux as $file) {
                $fileInfos = Filepond::field($file)->moveTo('/uploads/'.$userId.'/image_'.uniqid());
                $newFilePaths[] = $fileInfos['location'];
            }
            // Merge the new file paths into the existing JSON array
            $photosLocaux = array_merge($photosLocaux, $newFilePaths);
            // Set the updated JSON array back to the model
            $entreprise->photos_locaux = $photosLocaux;
            $entreprise->save();
        }

        $entreprise->save();
        $user->save();

        toast('La vitrine a bien été mise a jour','success')->autoClose(5000);

        return redirect()->back();
    }

    // TASKS
    public function myTasks(){
        // $tasks = Task::all();
        $user = auth()->user();
        

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $tasks = $user->tasks;
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $tasks = $entreprise->user->tasks;
        }

        return view('recruiter.taches.index', compact('tasks'));
    }
    public function addTask(Request $request){
        $task = new Task();
        $task->title = $request->name;
        $task->description = $request->description;
        $task->completed = false;
        $task->user_id = auth()->user()->id;
        $task->start_date = $request->start_date;
        $task->due_date = $request->end_date;
        $task->hour = $request->hour;
        $task->save();

        toast('Tâche ajoutée','success')->autoClose(5000);

        return redirect()->back();
    }
    public function seeMyTask($id){
        $task = Task::find($id);
        return view('recruiter.taches.edit', compact('task'));
    }
    public function updateTask(Request $request){
        $task = Task::find($request->task_id);
        $task->title = $request->nom_task;
        $task->description = $request->description;
        $task->completed = $request->status;
        $task->due_date = $request->date_fin;
        $task->start_date = $request->date_debut;
        $task->hour = $request->hour;
        $task->save();
        toast('Tâche modifiée','success')->autoClose(5000);
        return redirect()->route('recruiter.tasks');
    }
    public function completeTask($id){
        $task = Task::find($id);
        $task->completed = true;
        $task->save();
        toast('Tâche terminée','success')->autoClose(5000);
        return redirect()->back();
    }
    public function deleteTask($id){
        $task = Task::find($id);
        $task->delete();
        toast('Tâche supprimée','success')->autoClose(5000);
        return redirect()->back();
    }

    // OFFERS
    public function myOffers(){
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $offers = Offre::where('user_id', $user->id)->where('publish', 1)->get();
            $draftOffers = Offre::where('user_id', $user->id)->where('publish', 0)->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $offers = Offre::where('user_id', $entreprise->user_id)->where('publish', 1)->get();
            $draftOffers = Offre::where('user_id', $entreprise->user_id)->where('publish', 0)->get();
        }
        
        return view('recruiter.offres.index', compact('offers', 'draftOffers'));
    }
    public function myOffersCreate(){
        $jobs = Job::all();
        return view('recruiter.offres.create', compact('jobs'));
    }
    public function addOffer(Request $request){
        $offer = new Offre();
        $offer->project_campaign_name = $request->input('project_campaign_name');
        $offer->job_title = $request->input('job_title');
        $offer->start_date = $request->input('start_date');
        $offer->location_city = $request->input('location_city');
        $offer->location_postal_code = $request->input('location_postal_code');
        $offer->location_address = $request->input('location_address');
        $offer->rome_code = $request->input('rome_code');
        $offer->contract_type = $request->input('contract_type');
        $offer->work_schedule = json_encode($request->input('work_schedule'));
        $offer->weekly_hours = $request->input('weekly_hours');
        $offer->experience_level = $request->input('experience_level');

        $offer->desired_languages = in_array('Autre', $request->input('desired_languages')) ? json_encode(explode(',', $request->input('other_language')))
         : json_encode($request->input('desired_languages'));

        $offer->education_level = $request->input('education_level');
        $offer->brut_salary = $request->input('brut_salary');
        $offer->industry_sector = $request->input('industry_sector') == 'Autres' ? $request->input('other_sectors') : $request->input('industry_sector');
        $offer->benefits = $request->input('benefits');
        $offer->publication_date = $request->input('publication_date');
        $offer->unpublish_date = $request->input('unpublish_date');
        $offer->selected_jobboards = json_encode($request->input('selected_jobboards'));
        $offer->advertising_costs = $request->input('advertising_costs');
        $offer->user_id = auth()->user()->id;
        $offer->post_tasks = json_encode(explode(',', $request->input('post_tasks')));
        $offer->publish = true;
        $offer->save();

        toast('Offre ajoutée','success')->autoClose(5000);
        return redirect()->route('recruiter.offers');
    }
    public function saveDraftOffer(Request $request){
        $offer = new Offre();
        $offer->project_campaign_name = $request->input('project_campaign_name');
        $offer->job_title = $request->input('job_title');
        $offer->start_date = $request->input('start_date');
        $offer->location_city = $request->input('location_city');
        $offer->location_postal_code = $request->input('location_postal_code');
        $offer->location_address = $request->input('location_address');
        $offer->rome_code = $request->input('rome_code');
        $offer->contract_type = $request->input('contract_type');
        $offer->work_schedule = json_encode($request->input('work_schedule'));
        $offer->weekly_hours = $request->input('weekly_hours');
        $offer->experience_level = $request->input('experience_level');

        $offer->desired_languages = in_array('Autre', $request->input('desired_languages')) ? json_encode(explode(',', $request->input('other_language')))
         : json_encode($request->input('desired_languages'));

        $offer->education_level = $request->input('education_level');
        $offer->brut_salary = $request->input('brut_salary');
        $offer->industry_sector = $request->input('industry_sector') == 'Autres' ? $request->input('other_sectors') : $request->input('industry_sector');
        $offer->benefits = $request->input('benefits');
        $offer->publication_date = $request->input('publication_date');
        $offer->unpublish_date = $request->input('unpublish_date');
        $offer->selected_jobboards = json_encode($request->input('selected_jobboards'));
        $offer->advertising_costs = $request->input('advertising_costs');
        $offer->user_id = auth()->user()->id;
        $offer->post_tasks = json_encode(explode(',', $request->input('post_tasks')));
        $offer->publish = false;
        $offer->save();

        toast('Offre ajoutée au brouillon','success')->autoClose(5000);
        return redirect()->route('recruiter.offers');
    }
    public function updateDraftOffer(Request $request){
        $offer = Offre::find($request->offer_id);
        $offer->project_campaign_name = $request->input('project_campaign_name');
        $offer->job_title = $request->input('job_title');
        $offer->start_date = $request->input('start_date');
        $offer->location_city = $request->input('location_city');
        $offer->location_postal_code = $request->input('location_postal_code');
        $offer->location_address = $request->input('location_address');
        $offer->rome_code = $request->input('rome_code');
        $offer->contract_type = $request->input('contract_type');
        $offer->work_schedule = json_encode($request->input('work_schedule'));
        $offer->weekly_hours = $request->input('weekly_hours');
        $offer->experience_level = $request->input('experience_level');

        if($request->input('desired_languages') != null && count($request->input('desired_languages')) > 0){
            $offer->desired_languages = in_array('Autre', $request->input('desired_languages')) ? json_encode(explode(',', $request->input('other_language')))
            : json_encode($request->input('desired_languages'));
        }

        $offer->education_level = $request->input('education_level');
        $offer->brut_salary = $request->input('brut_salary');
        $offer->industry_sector = $request->input('industry_sector') == 'Autres' ? $request->input('other_sectors') : $request->input('industry_sector');
        $offer->benefits = $request->input('benefits');
        $offer->publication_date = $request->input('publication_date');
        $offer->unpublish_date = $request->input('unpublish_date');
        $offer->selected_jobboards = json_encode($request->input('selected_jobboards'));
        $offer->advertising_costs = $request->input('advertising_costs');
        $offer->user_id = auth()->user()->id;
        $offer->post_tasks = json_encode(explode(',', $request->input('post_tasks')));
        $offer->publish = false;
        $offer->save();

        toast('Offre modifiée','success')->autoClose(5000);
        return redirect()->route('recruiter.offers');
    }
    public function myOffersShow($id){
        $offer = Offre::find($id);
        return view('recruiter.offres.show', compact('offer'));
    }
    public function myOffersEdit($id){
        $offer = Offre::find($id);
        $jobs = Job::all();
        return view('recruiter.offres.edit', compact('offer', 'jobs'));
    }
    public function updateOffer(Request $request){
        $offer = Offre::find($request->offer_id);
        $offer->project_campaign_name = $request->input('project_campaign_name');
        $offer->job_title = $request->input('job_title');
        $offer->start_date = $request->input('start_date');
        $offer->location_city = $request->input('location_city');
        $offer->location_postal_code = $request->input('location_postal_code');
        $offer->location_address = $request->input('location_address');
        $offer->rome_code = $request->input('rome_code');
        $offer->contract_type = $request->input('contract_type');
        $offer->work_schedule = $request->input('work_schedule');
        $offer->weekly_hours = $request->input('weekly_hours');
        $offer->experience_level = $request->input('experience_level');
        // $offer->desired_languages = json_encode($request->input('desired_languages'));
        $offer->desired_languages = in_array('Autre', $request->input('desired_languages')) ? json_encode(explode(',', $request->input('other_language')))
         : json_encode($request->input('desired_languages'));
        $offer->education_level = $request->input('education_level');
        $offer->brut_salary = $request->input('brut_salary');
        // $offer->industry_sector = $request->input('industry_sector');
        $offer->industry_sector = $request->input('industry_sector') == 'Autres' ? $request->input('other_sectors') : $request->input('industry_sector');
        $offer->benefits = $request->input('benefits');
        $offer->publication_date = $request->input('publication_date');
        $offer->unpublish_date = $request->input('unpublish_date');
        $offer->selected_jobboards = json_encode($request->input('selected_jobboards'));
        $offer->advertising_costs = $request->input('advertising_costs');
        $offer->post_tasks = json_encode(explode(',', $request->input('post_tasks')));
        $offer->publish = true;
        $offer->save();

        toast('Offre modifiée','success')->autoClose(5000);
        return redirect()->route('recruiter.offers');
    }
    public function myOffersDelete($id){
        $offer = Offre::find($id);
        $offer->delete();
        toast('Offre supprimée','success')->autoClose(5000);
        return redirect()->back();
    }
    public function getRomeCodes(){
        $romes = Job::all();
        // get only jobs where code_ogr is not null or empty
        $romes = $romes->whereNotNull('code_ogr')
        ->where('code_ogr', '!=', '')
        ->where('code_ogr', '!=', ' ')
        ->whereNotNull('full_name')
        ->pluck('code_ogr', 'full_name');
        
        return response()->json($romes);
    }

    // EVENTS 
    public function myEvents(){
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $events = Event::where('user_id', $user->id)->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $events = Event::where('user_id', $entreprise->user_id)->get();
        }
        
        return view('recruiter.events.index', compact('events'));
    }
    public function myEventsStore(Request $request){
        // Create a new event instance
        $event = new Event([
            'organizer_name' => $request->input('organizer_name'),
            'job_position' => $request->input('job_position'),
            'participants_count' => $request->input('participants_count'),
            'event_address' => $request->input('event_address'),
            'free_entry' => $request->has('free_entry'),
            'digital_badge_download' => $request->input('digital_badge_download'),
            'required_documents' => $request->input('required_documents'),
            'event_date' => $request->input('event_date'),
            'event_hour' => $request->input('event_hour'),
            'statut' => 'Active',
            'user_id' => auth()->user()->id, // Assuming you have authentication
        ]);

        // Save the event to the database
        $event->save();

        toast('Evenement ajouté','success')->autoClose(5000);

        return redirect()->back();
    }
    public function myEventsEdit($id){
        $event = Event::find($id);
       
        // $qrcode = QrCode::generate('Make me into a QrCode!');
        $qrcode = QrCode::size(100)
        ->generate("EventID:{$event->id}, Organizer:{$event->organizer_name}, Date:{$event->event_date}, Time:{$event->event_hour}");
        return view('recruiter.events.edit', compact('event', 'qrcode'));
    }
    public function myEventsUpdate(Request $request){
        $event = Event::find($request->event_id);
        $event->organizer_name = $request->input('organizer_name');
        $event->job_position = $request->input('job_position');
        $event->participants_count = $request->input('participants_count');
        $event->event_address = $request->input('event_address');
        $event->free_entry = $request->has('free_entry');
        $event->digital_badge_download = $request->input('digital_badge_download');
        $event->required_documents = $request->input('required_documents');
        $event->event_date = $request->input('event_date');
        $event->event_hour = $request->input('event_hour');
        $event->save();

        toast('Evenement modifié','success')->autoClose(5000);

        return redirect()->back();
    }
    public function MyEventsShow($id){
        $event = Event::find($id);
        return view('recruiter.events.show', compact('event'));
    }
    public function myEventsDelete($id){
        $event = Event::find($id);
        $event->participants()->detach();
        $event->delete();
        toast('Evenement supprimé','success')->autoClose(5000);
        return redirect()->back();
    }
    public function getUserRdvs(){
        $user = auth()->user();
        $rdvs = $user->rendezvous;
        return response()->json($rdvs);
    }
    public function getUserFormations(){
        $user = auth()->user();
        $formations = $user->formations;
        return response()->json($formations);
    }
    public function getUserEvents(){
        $user = auth()->user();
        $events = $user->events()->where('statut', 'active')->get();
        return response()->json($events);
    }
    public function getUserById($id){
        $user = User::find($id);
        return response()->json($user);
    }
    public function myEventsSuspend($id){
        $event = Event::find($id);
        $event->statut = 'Suspendu';
        $event->save();
        toast('Evenement Suspendu','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myEventsResume($id){
        $event = Event::find($id);
        $event->statut = 'Actif';
        $event->save();
        toast('Evenement activé.','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myEventsCancel($id){
        $event = Event::find($id);
        $event->statut = 'Annulé';
        $event->save();
        toast('Evenement annulé.','success')->autoClose(5000);
        return redirect()->back();
    }

    // FACTURE ET CONTRAT
    public function myFacturesAndContracts(){
        $user = auth()->user();
        // $documents = $user->documents()
        // ->where('type', 'facture')
        // ->orWhere('type', 'contrat')
        // ->get();
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $documents = Document::where('user_id', $user->id)->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $documents = Document::where('user_id', $entreprise->user_id)->get();
        }

        return view('recruiter.factures-contrats', compact('documents'));
    }
    public function addFactureOrContract(Request $request){
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
            'file' => $filePath,
            'type' => $request->type,
        ]);

        toast('Votre document a bien été ajouté','success')->autoClose(5000);

        return redirect()->back();
    }

    // CALENDRIER
    public function myCalendar(){
        $user = auth()->user();
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $events = $user->events;
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $events = $entreprise->user->events;
        }
        return view('recruiter.calendrier', compact('events'));
    }

    // FORMATIONS
    public function myFormations(){
        $user = auth()->user();
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $formations = $user->formations;
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $formations = $entreprise->user->formations;
        }
        return view('recruiter.formations.index', compact('formations'));
    }
    public function myFormationsCreate(){
        return view('recruiter.formations.create');
    }
    public function addFormation(Request $request){
        $user = auth()->user();
        $formation = $user->formations()->create([
            'job_title' => $request->job_title,
            'training_duration' => $request->training_duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cdi_at_hiring' => $request->cdi_at_hiring == 'on' ? true : false,
            'skills_acquired' => $request->skills_acquired,
            'work_location' => $request->work_location,
            'open_positions' => $request->open_positions,
            'registration_deadline' => $request->registration_deadline,
            // 'upload_documents' => json_encode($request->upload_documents),
            'status' => 'Active',
            'max_participants' => $request->max_participants
        ]);

        if ($request->hasFile('uploaded_documents')) {
            $newFilePaths = [];
            foreach ($request->file('uploaded_documents') as $file) {
                $fileName = $user->id . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/' . $user->id, $fileName);
                $newFilePaths[] = $filePath;
            }
            // Set the updated JSON array back to the model
            $formation->uploaded_documents = $newFilePaths;
            $formation->save();
        }

        toast('Formation ajoutée','success')->autoClose(5000);

        return redirect()->back();
    }
    public function myFormationsEdit($id){
        $formation = Formation::find($id);
        return view('recruiter.formations.edit', compact('formation'));
    }
    public function updateFormation(Request $request){
        $user = auth()->user();
        $formation = Formation::find($request->id);
        $formation->update([
            'job_title' => $request->job_title,
            'training_duration' => $request->training_duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cdi_at_hiring' => $request->cdi_at_hiring == 'on' ? true : false,
            'skills_acquired' => $request->skills_acquired,
            'work_location' => $request->work_location,
            'open_positions' => $request->open_positions,
            'registration_deadline' => $request->registration_deadline,
            'status' => $request->status,
            'max_participants' => $request->max_participants
        ]);

        if ($request->hasFile('uploaded_documents')) {
            $photosLocaux = json_decode($formation->uploaded_documents) ?? [];
            $newFilePaths = [];
        
            foreach ($request->file('uploaded_documents') as $file) {
                $fileName = $user->id . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/' . $user->id, $fileName);
        
                $newFilePaths[] = $filePath;
            }
        
            // Merge the new file paths into the existing array
            $photosLocaux = array_merge($photosLocaux, $newFilePaths);
        
            // Set the updated array back to the model
            $formation->uploaded_documents = $photosLocaux;
        
            $formation->save();
        }

        toast('Formation mise à jour','success')->autoClose(5000);

        return redirect()->route('recruiter.formation');
    }
    public function myFormationDeleteDoc(Request $request, $id, $userId, $docname)
    {
        $formation = Formation::find($id);
        $formation->uploaded_documents = array_diff(json_decode($formation->uploaded_documents, true), ['public/'.$userId.'/'.$docname]);
        $formation->save();
       
        toast('Document supprimé','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myFormationsSuspend($id){
        $formation = Formation::find($id);
        $formation->status = 'Suspendue';
        $formation->save();
        toast('Formation suspendue','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myFormationsRestart($id){
        $formation = Formation::find($id);
        $formation->status = 'Active';
        $formation->save();
        toast('Formation reprise','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myFormationsClose($id){
        $formation = Formation::find($id);
        $formation->status = 'Ferme';
        $formation->save();
        toast('Formation fermée','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myFormationsDelete($id){
        $formation = Formation::find($id);
        $formation->participants()->detach();
        $formation->delete();
        toast('Formation supprimée','success')->autoClose(5000);
        return redirect()->back();
    }

    // MAILS
    public function myMails(){
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $emails = $user->emails;
            $receivedEmails = Email::where('receiver_id', $user->id)->get();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $emails = $entreprise->user->emails;
            $receivedEmails = Email::where('receiver_id', $entreprise->user->id)->get();
        }
        $draftEmails = $emails->where('draft', true)->where('trash', false);
        $deletedEmails = $emails->where('trash', true);
        $emails = $emails->where('trash', false)->where('draft', false);
        $receivedEmails = $receivedEmails->where('trash', false)->where('draft', false);
        
        $receivers = User::all();
        return view('recruiter.emails.index', compact('emails', 'receivedEmails', 'receivers', 'draftEmails', 'deletedEmails'));
    }
    public function getMyMail(Request $request){
        $email = Email::find($request->id);
        return response()->json($email);
    }
    public function createMail(){
        $receivers = User::all();
        return view('recruiter.emails.create', compact('receivers'));
    }
    public function myMailsShow($id){
        $email = Email::find($id);
        return view('recruiter.emails.show', compact('email'));
        // return response()->json($email);
    }
    public function myMailsDelete($id){
        $email = Email::find($id);
        $email->trash = true;
        $email->save();
        toast('Email supprimé','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myMailsAjaxDelete(Request $request){
        $emailsIds = $request;
        $emails = Email::whereIn('id', $emailsIds)->update(['trash' => true]);
        return response()->json($emails);
    }

    // STATS
    public function stats(){
        $user = auth()->user();

        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $user = auth()->user();
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $user = $entreprise->user;
        }
        
        // Create an array with all 12 months
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $days = range(1, Carbon::create($currentYear, $currentMonth)->daysInMonth);
        
        $doneRdvs = $user->rendezvous()->where('status', 'Effectué')->count();
        $refusedRdvs = $user->rendezvous()->where('status', 'Annulé')->count();
        $pendingRdvs = $user->rendezvous()->where('status', 'En attente')->count();

        $offers = $user->offers;
        $candidatures = $user->candidatures;

        // OFFERS BY DAY
        $groupedByDay = $offers->groupBy(function ($item) {
            return $item->created_at->toDateString(); // Assuming 'created_at' is your timestamp field
        });
        $offersByDay = [];
        foreach ($days as $day) {
            $dateString = Carbon::create($currentYear, $currentMonth, $day)->toDateString();
            $offersByDay[$dateString] = $groupedByDay->get($dateString, collect())->count();
        }

        // OFFERS BY WEEK
        $groupedByWeek = $offers->groupBy(function ($item) {
            return $item->created_at->startOfWeek()->format('Y-m-d');
        });

        $offersByWeek = [];
        foreach ($groupedByWeek as $weekStartDate => $offersInWeek) {
            $endDate = Carbon::createFromFormat('Y-m-d', $weekStartDate)->endOfWeek()->format('Y-m-d');
            $offersByWeek[$weekStartDate . ' | ' . $endDate] = $offersInWeek->count();
        }

        // OFFERS BY MONTH
        $offersByMonth = [];
        // Initialize counts for all months
        foreach ($months as $month => $monthName) {
            $offersByMonth[$month] = 0;
        }
        // Group the data by month
        $groupedByMonth = $offers->groupBy(function ($item) {
            return $item->created_at->format('m'); // Group by month
        });
        // Calculate the count for each group
        foreach ($groupedByMonth as $month => $group) {
            $offersByMonth[$month] = $group->count();
        }

        //___________________//
        // CANDIDATURES BY DAY
        $groupedByDay = $candidatures->groupBy(function ($item) {
            return $item->created_at->toDateString(); // Assuming 'created_at' is your timestamp field
        });
        $candidaturesByDay = [];
        foreach ($days as $day) {
            $dateString = Carbon::create($currentYear, $currentMonth, $day)->toDateString();
            $candidaturesByDay[$dateString] = $groupedByDay->get($dateString, collect())->count();
        }

        // CANDIDATURES BY WEEK
        $groupedByWeek = $candidatures->groupBy(function ($item) {
            return $item->created_at->startOfWeek()->format('Y-m-d');
        });

        $candidaturesByWeek = [];
        foreach ($groupedByWeek as $weekStartDate => $candidaturesInWeek) {
            $endDate = Carbon::createFromFormat('Y-m-d', $weekStartDate)->endOfWeek()->format('Y-m-d');
            $candidaturesByWeek[$weekStartDate . ' | ' . $endDate] = $candidaturesInWeek->count();
        }

        // CANDIDATURES BY MONTH
        $candidaturesByMonth = [];
        // Initialize counts for all months
        foreach ($months as $month => $monthName) {
            $candidaturesByMonth[$month] = 0;
        }
        // Group the data by month
        $groupedByMonth = $candidatures->groupBy(function ($item) {
            return $item->created_at->format('m'); // Group by month
        });
        // Calculate the count for each group
        foreach ($groupedByMonth as $month => $group) {
            $candidaturesByMonth[$month] = $group->count();
        }

        // dd($offersByDay, $offersByWeek, $offersByMonth);
        return view('recruiter.stats.index', compact('candidaturesByMonth', 'candidaturesByWeek',  'candidaturesByDay', 'offersByMonth', 'offersByWeek', 'offersByDay', 'doneRdvs','refusedRdvs','pendingRdvs'));
    }

    // CANDIDATURE
    public function myCandidatures(){
        $user = auth()->user();
        
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $candidatures = $user->candidatures;
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $candidatures = $entreprise->user->candidatures;
        }

        foreach ($candidatures as $candidature) {
            $candidatUser = User::find($candidature->candidat_id);
            $candidature->candidat_name = $candidatUser->name;
        }

        return view('recruiter.candidatures.index', compact('candidatures'));
    }
    public function updateCandidatureStatus(Request $request){
        $candidature  = Candidature::find($request->candidatureId);
        $candidature->status = $request->status;
        $candidature->save();
        
        return response()->json($candidature);
    }

    // HISTORIQUE DE RECHERCHE
    public function getSearchHistory(){
        $user = auth()->user();
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $histories = auth()->user()->history;
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $histories = $entreprise->user->history;
        }
        return view('recruiter.history.index', compact('histories'));
    }
    public function addHistoryRecord(Request $request){
        $curriculum = Curriculum::find($request->cv_id);
        // update the user->history 
        $user = auth()->user();
        $existingRecord = History::where('user_id', $user->id)
        ->where('searchable', $curriculum->id)
        ->where('created_at', '>', Carbon::now()->subDay())
        ->first();
        if (!$existingRecord) {
            $history = new History();
            $history->user_id = $user->id;
            $history->searchable = $curriculum->id;
            $history->save();
        }

        return response()->json($existingRecord);
    }

    // COMPTE ADMINISTRATEUR
    public function adminAccount(){
        $user = auth()->user();
        if($user->parent_entreprise_id == null){
            // USER IS ADMIN
            $adminEntrepriseId = $user->entreprise->first()->id;
        }else{
            // OTHER TEAM MEMBERS
            $adminEntreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $adminEntrepriseId = $adminEntreprise->id;
        }
        $users = User::where('parent_entreprise_id', $adminEntrepriseId)->get();

        return view('recruiter.account.index', compact('user', 'users'));
    }
    public function updateProfile(Request $request){
        $user = auth()->user();
        $user->name = $request->name;
        $user->birth_date = $request->birth;
        $user->function = $request->function;

        $userId = $user->id;

        // Get the uploaded file
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Generate a unique filename
            $fileName = $userId . '-' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the user's directory within the storage/app/public directory
            $filePath = $file->storeAs('public/uploads/' . $userId, $fileName);

            $user->avatar = $filePath;
          
        }

        $user->save();
        toast('Vos informations ont bien été mises à jour', 'success');
        return redirect()->back();
    }
    public function updatePassword(Request $request){
        // $user = auth()->user();
        // $user->password = bcrypt($request->password);
        // $user->save();
        // toast('Votre mot de passe a bien été mis à jour', 'success');
        // return redirect()->back();
        $user = auth()->user();
        $actualPassword = $request->input('actual_password');
        $newPassword = $request->input('password');
        $confirmedPassword = $request->input('confirmed_password');
    
        // Check if the actual password matches the user's hashed password
        if (Hash::check($actualPassword, $user->password)) {
            // Actual password is correct, proceed with updating the password
            if ($newPassword === $confirmedPassword) {
                // New password and confirmed password match, update the password
                $user->password = bcrypt($newPassword);
                $user->save();
                toast('Votre mot de passe a bien été mis à jour', 'success');
                return redirect()->back();
            } else {
                // New password and confirmed password do not match, display an error message
                toast('La confirmation du nouveau mot de passe ne correspond pas. Veuillez réessayer.', 'error');
                return redirect()->back();
            }
        } else {
            // Actual password is incorrect, display an error message
            toast('Le mot de passe actuel est incorrect. Veuillez réessayer.', 'error');
            return redirect()->back();
        }
    }
    public function deleteAvatar(){
        $user = auth()->user();
        $user->avatar = null;
        $user->save();
        toast('Votre avatar a bien été supprimé', 'success');
        return redirect()->back();
    }
    public function deleteAccount(Request $request){
        $user = auth()->user();
        $password = $request->input('password');
        // Check if the provided password matches the user's hashed password
        if (Hash::check($password, $user->password)) {
            // Password is correct, proceed with deletion
            $user->delete();
            toast('Votre compte a bien été supprimé', 'success');
            return redirect('/');
        } else {
            // Password is incorrect, display an error message
            toast('Le mot de passe est incorrect. Veuillez réessayer.', 'error');
            return redirect()->back();
        }
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        toast('L\'utilisateur a bien été supprimé', 'success');
        return redirect()->back();
    }

    // CHAT
    public function chat(){
        return view('recruiter.chat.index');
    }
}
