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
use App\Mail\RendezVousDateOrHourChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Facades\Filepond;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RecruiterController extends Controller
{   

    // DASHBOARD
    public function dashboard(){
        $jobs = Job::all();
        return view('recruiter.dashboard', compact('jobs'));
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
    public function cvthequeSearch(Request $request){
        $searchTerm = $request->all();

        // Create a query builder instance
        $query = Curriculum::query();

        // Apply search conditions for each field
        if (!empty($searchTerm['metier_recherche'])) {
            $query->where('metier_recherche', 'like', '%' . $searchTerm['metier_recherche'] . '%');
        }
        if (!empty($searchTerm['ville_domiciliation'])) {
            $query->where('ville_domiciliation', 'like', '%' . $searchTerm['ville_domiciliation'] . '%')
            ->orWhere('address', 'like', '%' . $searchTerm['ville_domiciliation'] . '%');
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
        // if (!empty($searchTerm['valeur'])) {
        //     $query->where('valeurs->valeur', 'like', '%' . $searchTerm['valeur'] . '%');
        // }
        if (!empty($searchTerm['valeur'])) {
            $query->where(function ($query) use ($searchTerm) {
                $query->orWhereJsonContains('valeurs', $searchTerm['valeur']);
            });
        }

        $curriculums = $query->get();

        // Calculate percentage match for each curriculum
        $searchCriteria = array_filter($searchTerm);
        foreach ($curriculums as $curriculum) {
            $matchingFields = 0;
            foreach ($searchCriteria as $field => $value) {
                if (str_contains(strtolower($curriculum->$field), strtolower($value))) {
                    $matchingFields++;
                }
            }
            $percentageMatch = count($searchCriteria) > 0 ? ($matchingFields / count($searchCriteria)) * 100 : 0;
           
            $curriculum->percentageMatch = $percentageMatch;
        }

        // Create search History model with the request data
        $history = new History();
        $history->user_id = auth()->user()->id;
        $history->metier_recherche = $searchTerm['metier_recherche'];
        $history->annees_experience = $searchTerm['annees_experience'];
        $history->ville_domiciliation = $searchTerm['ville_domiciliation'];
        $history->niveau_etudes = $searchTerm['niveau_etudes'];
        $history->pretentions_salariales = $searchTerm['pretentions_salariales'];
        $history->valeurs = isset($searchTerm['valeur']) ? json_encode($searchTerm['valeur']) : null;

        $history->save();

        $jobs = Job::all();

        return view('recruiter.cvtheque', compact('curriculums', 'jobs'));
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
        $favoriteIds = json_decode($user->favorites->pluck('favorites')->first(), true) ?? [];
        $favorites = Curriculum::whereIn('id', $favoriteIds)->get();
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

        $message_body = 'Nous espérons que ce message vous trouve en pleine forme. Nous sommes ravis de poursuivre votre candidature et aimerions vous inviter à un entretien pour discuter de vos qualifications et de votre potentiel d\'intégration au sein de notre équipe.
                        Pour convenir à votre emploi du temps, nous vous proposons trois créneaux horaires disponibles pour votre entretien. Veuillez examiner les options ci-dessous et nous faire part de votre choix préféré :';
        
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
            'title' => 'Proposition de rendez-vous',
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

        foreach($participants as $participant){
            // Send Emails TO all the participant 
            $user = User::find($participant);
            Mail::to($user->email)->send(new SendRdvInvitation($emailDetails));
            $email = Email::create([
                'user_id' => auth()->user()->id,
                'subject' => 'Rendez-vous',
                'message' => $message_body,
                'receiver_id' => $participant,
            ]);
        }

        return response()->json([
            'status' => 'success',
        ]);
    }

    // RDV
    public function myRdv(){
        $user = auth()->user();
        $rdvs = $user->rendezvous()
        // ->where('status', '!=', 'En attente confirmation candidat')
        // ->whereNotNull('participant')
        ->get();
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
        $documents = $user->documents()->where('type', 'document')->get();
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
        $tasks = $user->tasks;
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
        return redirect()->back();
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
        }else{
            // OTHER TEAM MEMBERS
            $entreprise = Entreprise::where('id', $user->parent_entreprise_id)->first();
            $offers = Offre::where('user_id', $entreprise->user_id)->where('publish', 1)->get();
        }
        
        return view('recruiter.offres.index', compact('offers'));
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
        $offer->work_schedule = $request->input('work_schedule');
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
        $offer->work_schedule = $request->input('work_schedule');
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
        $offer->publish = false;
        $offer->save();

        toast('Offre ajoutée','success')->autoClose(5000);
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
            'statut' => 'open',
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
    public function myEventsDelete($id){
        $event = Event::find($id);
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
    public function myEventsSuspend($id){
        $event = Event::find($id);
        $event->statut = 'suspended';
        $event->save();
        toast('Evenement Suspendue.','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myEventsResume($id){
        $event = Event::find($id);
        $event->statut = 'active';
        $event->save();
        toast('Evenement activé.','success')->autoClose(5000);
        return redirect()->back();
    }
    public function myEventsCancel($id){
        $event = Event::find($id);
        $event->statut = 'cancelled';
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
        $events = $user->events;
        return view('recruiter.calendrier', compact('events'));
    }

    // FORMATIONS
    public function myFormations(){
        $user = auth()->user();
        $formations = $user->formations;
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
            'status' => $request->status,
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

        return redirect()->back();
    }
    public function myFormationDeleteDoc(Request $request, $id, $userId,$docname)
    {
        dd($id, $userId, $docname);
        $fomation = Formation::find($id);
        $formation->uploaded_documents = array_diff($formation->uploaded_documents, [$docname]);
        // Example usage:
        echo "Retrieved ID: $retrievedId";
        echo "Filtered document name: $filteredDocname";

        // ... your controller logic to handle document deletion ...
    }

    // MAILS
    public function myMails(){
        $user = auth()->user();
        $emails = $user->emails;
        $receivedEmails = Email::where('receiver_id', $user->id)->get();
        $receivers = User::all();
        return view('recruiter.emails.index', compact('emails', 'receivedEmails', 'receivers'));
    }
    public function getMyMail(Request $request){
        $email = Email::find($request->id);
        return response()->json($email);
    }
    public function createMail(){
        $receivers = User::all();
        return view('recruiter.emails.create', compact('receivers'));
    }

    // STATS
    public function stats(){
        $user = auth()->user();
       
        $doneRdvs = $user->rendezvous()->where('status', 'Effectué')->count();
        $refusedRdvs = $user->rendezvous()->where('status', 'Annulé')->count();

        $offresByMetier = $user->offers->groupBy('rome_code')->map->count();
   
        $moyenneDureeRecrutement = 555;

        $dureeSusbcription = 555;
        return view('recruiter.stats.index', compact('doneRdvs','refusedRdvs', 'offresByMetier', 'dureeSusbcription', 'moyenneDureeRecrutement'));
    }

    // CANDIDATURE
    public function myCandidatures(){
        $user = auth()->user();
        $candidatures = $user->candidatures;
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
        $history = auth()->user()->history;
        return view('recruiter.history.index', compact('history'));
    }

    // COMPTE ADMINISTRATEUR
    public function adminAccount(){
        $user = auth()->user();
        $adminEntrepriseId = $user->entreprise->first()->id;
        $users = User::where('parent_entreprise_id', $adminEntrepriseId)->get();
        return view('recruiter.account.index', compact('user', 'users'));
    }

    // CHAT
    public function chat(){
        return view('recruiter.chat.index');
    }
}
