<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Candidat\CandidatController;
use App\Http\Controllers\Candidat\CurriculumController;
use App\Http\Controllers\Candidat\FavoritesController;
use App\Http\Controllers\Candidat\RendezVousController;
use App\Http\Controllers\Candidat\CandidatureController;
use App\Http\Controllers\Candidat\EmailController;
use App\Http\Controllers\Candidat\DocumentController;
use App\Http\Controllers\Candidat\TaskController;
use App\Http\Controllers\Candidat\EventController;
use App\Http\Controllers\Candidat\OfferController;
use App\Http\Controllers\Candidat\FormationController;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

use App\Models\Job;
use App\Models\Curriculum;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JobImport;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('site.home');
// });

Route::get('/excel-import', function () {
    set_time_limit(0);
    $data = json_decode(file_get_contents(storage_path('app/code_metier.json')));
    // dd($data);
    foreach ($data->metier as $item) {
        print_r($item->Metier);
        echo'<br>';
        print_r($item->Code);
        echo '<br>______________________________________<br>';

        Job::updateOrCreate([
            'code_ogr' => $item->Code,
        ],
        [
            'full_name' => $item->Metier,
            'code_ogr' => $item->Code
        ]);
        

    }
});

Auth::routes(['verify' => true]);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/mag', [HomeController::class, 'mag'])->name('mag');
Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::get('/parrainage', [HomeController::class, 'parrainage'])->name('parrainage');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/register-candidat', [HomeController::class, 'registerAsCandidat'])->name('register-as-candidat');
Route::get('/register-employeur', [HomeController::class, 'registerAsRecruiter'])->name('register-as-recruiter');

Route::get('/recruiter-dashboard/jobs', [RecruiterController::class, 'getJobsJson'])->name('recruiter.dashboard.jobs');
Route::get('/recruiter-dashboard/jobs/search', [RecruiterController::class, 'searchJobsJson'])->name('recruiter.dashboard.jobs.search');
Route::get('/candidat-profile/jobs/search', [RecruiterController::class, 'searchJobsJsonCandidatProfil'])->name('recruiter.dashboard.candidat.jobs.search');
Route::get('/getUserById/{id}', [RecruiterController::class, 'getUserById'])->name('getUserById');

Route::get('/candidat-plans', [HomeController::class, 'candidatPlans'])->name('candidat.plans');
Route::get('/recruiter-plans', [HomeController::class, 'recruiterPlans'])->name('recruiter.plans');

// RECRUITER
Route::group(['middleware' => ['role:recruiter|limited|restricted', 'verified']], function () {
    // DASHBOARD
    Route::get('/recruiter-dashboard', [RecruiterController::class, 'dashboard'])->name('recruiter.dashboard');
    
    //
    Route::get('/cv-theque', [RecruiterController::class, 'cvtheque'])->name('recruiter.cvtheque');
    Route::get('/cv-theque-search', [RecruiterController::class, 'cvthequeSearch'])->name('recruiter.cvtheque.search');
    Route::get('/mes-favoris', [RecruiterController::class, 'myFavorites'])->name('recruiter.favorites');
    // Route::get('/mes-offres-emploi', [RecruiterController::class, 'myJobOffers'])->name('recruiter.offres');
    Route::get('/ma-vitrine', [RecruiterController::class, 'myVitrine'])->name('recruiter.vitrine');
    Route::get('/mes-rendez-vous', [RecruiterController::class, 'myRdv'])->name('recruiter.rendez-vous');
    Route::get('/mon-rendez-vous/{id}', [RecruiterController::class, 'seeMyRdv'])->name('recruiter.rendez-vous.see');
    Route::post('/mon-rendez-vous/update', [RecruiterController::class, 'updateMyRdv'])->name('recruiter.rendez-vous.update');
    Route::get('/mon-rendez-vous-cancel/{id}', [RecruiterController::class, 'cancelMyRdv'])->name('recruiter.rendez-vous.cancel');

    Route::get('/mes-documents', [RecruiterController::class, 'myDocuments'])->name('recruiter.documents');
    Route::get('/mes-taches', [RecruiterController::class, 'myTasks'])->name('recruiter.tasks');
    Route::get('/ma-taches/{id}', [RecruiterController::class, 'seeMyTask'])->name('recruiter.tache.see');
   
    Route::get('/all-rome-codes', [RecruiterController::class, 'getRomeCodes'])->name('getRomeCodes');
    
    Route::post('/cv-theque/add-favorite', [RecruiterController::class, 'cvthequeAddFavorite'])->name('recruiter.cvtheque.add.favorite');
    
    Route::post('/favorties/invite-candidates', [RecruiterController::class, 'inviteCandidates'])->name('recruiter.invite.candidates');
    
    Route::post('/document/add', [RecruiterController::class, 'addDocument'])->name('recruiter.document.add');
    Route::get('/document/delete/{id}', [RecruiterController::class, 'deleteDocument'])->name('recruiter.document.delete');
    
    Route::post('/commentaire/add', [RecruiterController::class, 'addCommentaire'])->name('recruiter.commentaire.add');
    
    Route::post('/ma-vitrine/update', [RecruiterController::class, 'updateVitrine'])->name('recruiter.update.vitrine');

    // TASKS
    Route::post('/task/add', [RecruiterController::class, 'addTask'])->name('recruiter.task.add');
    Route::post('/task/update', [RecruiterController::class, 'updateTask'])->name('recruiter.task.update');
    Route::get('/task/complete/{id}', [RecruiterController::class, 'completeTask'])->name('recruiter.task.complete');
    Route::get('/task/delete/{id}', [RecruiterController::class, 'deleteTask'])->name('recruiter.task.delete');

    // OFFERS
    Route::get('/mes-offres', [RecruiterController::class, 'myOffers'])->name('recruiter.offers');
    Route::get('/mes-offres/create', [RecruiterController::class, 'myOffersCreate'])->name('recruiter.offers.create');
    Route::post('/offer/add', [RecruiterController::class, 'addOffer'])->name('recruiter.offer.add');
    Route::post('/offer/draft/create', [RecruiterController::class, 'saveDraftOffer'])->name('recruiter.offer.draft');
    Route::post('/offer/draft/save', [RecruiterController::class, 'updateDraftOffer'])->name('recruiter.offer.draft.update');
    Route::get('/mes-offres/edit/{id}', [RecruiterController::class, 'myOffersEdit'])->name('recruiter.offers.edit');
    Route::get('/mes-offres/show/{id}', [RecruiterController::class, 'myOffersShow'])->name('recruiter.offers.show');
    Route::post('/offer/update', [RecruiterController::class, 'updateOffer'])->name('recruiter.offer.update');
    Route::get('/mes-offres/delete/{id}', [RecruiterController::class, 'myOffersDelete'])->name('recruiter.offers.delete');

    // EVENTS
    Route::get('/mes-evenements', [RecruiterController::class, 'myEvents'])->name('recruiter.events');
    Route::post('/mes-evenements-create', [RecruiterController::class, 'myEventsStore'])->name('recruiter.events.store');
    Route::get('/mes-evenements/edit/{id}', [RecruiterController::class, 'myEventsEdit'])->name('recruiter.events.edit');
    Route::post('/mes-evenements/update', [RecruiterController::class, 'myEventsUpdate'])->name('recruiter.events.update');
    Route::get('/mes-evenements/show/{id}', [RecruiterController::class, 'MyEventsShow'])->name('recruiter.events.show');
    Route::get('/mes-evenements/delete/{id}', [RecruiterController::class, 'myEventsDelete'])->name('recruiter.events.delete');
    
    Route::get('/mes-evenements/suspend/{id}', [RecruiterController::class, 'myEventsSuspend'])->name('recruiter.events.suspend');
    Route::get('/mes-evenements/resume/{id}', [RecruiterController::class, 'myEventsResume'])->name('recruiter.events.resume');
    Route::get('/mes-evenements/cancel/{id}', [RecruiterController::class, 'myEventsCancel'])->name('recruiter.events.cancel');
    
    Route::get('/getRdvs', [RecruiterController::class, 'getUserRdvs'])->name('getUserRdvs');
    Route::get('/getFormations', [RecruiterController::class, 'getUserFormations'])->name('getUserFormations');
    Route::get('/getEvents', [RecruiterController::class, 'getUserEvents'])->name('getUserEvents');
    
    // Factures And Contracts
    Route::get('/mes-factures-et-contrats', [RecruiterController::class, 'myFacturesAndContracts'])->name('recruiter.factures.and.contracts');
    Route::post('/mes-factures-et-contrats/create', [RecruiterController::class, 'addFactureOrContract'])->name('recruiter.factures.and.contracts.store');

    // FORMATIONS 
    Route::get('/mes-formations', [RecruiterController::class, 'myFormations'])->name('recruiter.formation');
    Route::get('/mes-formations/create', [RecruiterController::class, 'myFormationsCreate'])->name('recruiter.formation.create');
    Route::post('/formation/add', [RecruiterController::class, 'addFormation'])->name('recruiter.formation.add');
    Route::get('/mes-formations/edit/{id}', [RecruiterController::class, 'myFormationsEdit'])->name('recruiter.formation.edit');
    Route::post('/formation/update', [RecruiterController::class, 'updateFormation'])->name('recruiter.formation.update');
    Route::get('/mes-formations/delete-doc/{id}/{userid}/{docname}', [RecruiterController::class, 'myFormationDeleteDoc'])->name('recruiter.formation.document.delete');
    Route::get('/mes-formations/suspend/{id}', [RecruiterController::class, 'myFormationsSuspend'])->name('recruiter.formation.suspend');
    Route::get('/mes-formations/restart/{id}', [RecruiterController::class, 'myFormationsRestart'])->name('recruiter.formation.restart');
    Route::get('/mes-formations/close/{id}', [RecruiterController::class, 'myFormationsClose'])->name('recruiter.formation.close');
    Route::get('/mes-formations/delete/{id}', [RecruiterController::class, 'myFormationsDelete'])->name('recruiter.formation.delete');
    
    // EMAILS 
    Route::get('/mes-mails', [RecruiterController::class, 'myMails'])->name('recruiter.mails');
    Route::get('/mes-mails/create', [RecruiterController::class, 'createMail'])->name('recruiter.email.create');
    Route::get('/mon-mail', [RecruiterController::class, 'getMyMail'])->name('recruiter.email.show');
    Route::post('/email/recruiter/store', [EmailController::class, 'store'])->name('recruiter.email.store');
    Route::post('/email/recruiter/draft', [EmailController::class, 'draft'])->name('recruiter.email.draft');
    Route::get('/mes-mails/show/{id}', [RecruiterController::class, 'myMailsShow'])->name('recruiter.emails.show');
    Route::get('/mes-mails/delete/{id}', [RecruiterController::class, 'myMailsDelete'])->name('recruiter.emails.delete');
    Route::get('/mes-mails/destroy/{id}', [RecruiterController::class, 'myMailsDestroy'])->name('recruiter.emails.destroy');
    Route::post('/mes-mails/ajax-delete', [RecruiterController::class, 'myMailsAjaxDelete'])->name('recruiter.emails.ajax.delete');


    // STATS
    Route::get('/mes-stats', [RecruiterController::class, 'stats'])->name('recruiter.stats');

    // CALENDRIER
    Route::get('/mon-calendrier', [RecruiterController::class, 'myCalendar'])->name('recruiter.calendrier');

    // CANDIDATURE
    Route::get('/mes-candidatures', [RecruiterController::class, 'myCandidatures'])->name('recruiter.candidatures');
    Route::post('/mes-candidatures/update-status', [RecruiterController::class, 'updateCandidatureStatus'])->name('recruiter.candidature.updateStatus');

    // HISTORIQUE
    Route::get('/historique', [RecruiterController::class, 'getSearchHistory'])->name('recruiter.historique');
    Route::post('/historique/create', [RecruiterController::class, 'addHistoryRecord'])->name('recruiter.historique.store');

    // COMPTE ADMINISTRATEUR
    Route::get('/compte-administrateur', [RecruiterController::class, 'adminAccount'])->name('recruiter.admin.account');
    Route::post('/compte-administrateur/update', [RecruiterController::class, 'updateProfile'])->name('recruiter.admin.account.update');
    Route::get('/compte-administrateur/avatar/delete', [RecruiterController::class, 'deleteAvatar'])->name('recruiter.admin.account.avatar.delete');
    Route::post('/compte-administrateur/update-password', [RecruiterController::class, 'updatePassword'])->name('recruiter.admin.password.update');
    Route::post('/compte-administrateur/account-delete', [RecruiterController::class, 'deleteAccount'])->name('recruiter.admin.account.delete');
    Route::get('/compte-administrateur/user-delete/{id}', [RecruiterController::class, 'deleteUser'])->name('recruiter.admin.user.delete');
    
    // USERS
    Route::post('/compte-administrateur/create-user', [AdminController::class, 'createUser'])->name('recruiter.user.create');
    
    //TCHAT 
    Route::get('/chat', [RecruiterController::class, 'chat'])->name('recruiter.admin.chat');
});

Route::get('/candidat-cvredirect', [CurriculumController::class, 'cvredirect'])->name('candidat.cvredirect');
Route::post('/mon-curriculum', [CurriculumController::class, 'curriculumStore'])->name('candidat.curriculum.store');
Route::post('/mon-curriculum/cv/store', [CurriculumController::class, 'saveCvFile'])->name('candidat.cv.store');
// CANDIDAT
Route::group(['middleware' => ['role:candidat', 'checkCurriculum']], function () {

    Route::get('/candidat-dashboard', [CandidatController::class, 'dashboard'])->name('candidat.dashboard');
    Route::get('/candidat-favoris', [FavoritesController::class, 'favoris'])->name('candidat.favoris');
    Route::get('/candidat-rdvs', [RendezVousController::class, 'rdvs'])->name('candidat.rdvs');
    Route::get('/candidat-tasks', [TaskController::class, 'tasks'])->name('candidat.tasks');
    Route::get('/candidat-candidatures', [CandidatureController::class, 'candidatures'])->name('candidat.candidatures');
    Route::get('/candidat-emails', [EmailController::class, 'emails'])->name('candidat.emails');
    Route::get('/candidat-documents', [DocumentController::class, 'documents'])->name('candidat.documents');
    Route::get('/candidat-events', [EventController::class, 'events'])->name('candidat.events');
    Route::get('/candidat-formation', [FormationController::class, 'index'])->name('candidat.formation');
    Route::get('/candidat-account', [CandidatController::class, 'account'])->name('candidat.account');
    Route::get('/candidat-stats', [CandidatController::class, 'stats'])->name('candidat.stats');
    
    // CHoose Creneau
    Route::get('/candidat-creneau/choose/{time}', [CandidatController::class, 'chooseCreneau'])->name('candidat.creneau.choose');
    Route::get('/candidat-creneau/confirm/{id}', [CandidatController::class, 'confirmCreneau'])->name('candidat.creneau.confirm');

    // TODO
    Route::get('/candidat-historique', [HistoryController::class, 'historique'])->name('candidat.historique');
    Route::get('/candidat-administrateur', [AccountController::class, 'administrateur'])->name('candidat.administrateur');
    // Route::get('/candidat-stats', [StatsController::class, 'stats'])->name('candidat.stats');
    Route::get('/candidat-evenements', [EvenementController::class, 'evenements'])->name('candidat.evenements');

    // FAVORITES
    Route::post('/candidat/favortie/add', [FavoritesController::class, 'addToFavorites'])->name('candidat.favorite.add');
   
    // RDV
    Route::get('/candidat-rdv/cancel/{id}', [RendezVousController::class, 'cancelRdv'])->name('candidat.rdv.cancel');

    // TASKS
    Route::post('/task/candidate/add', [TaskController::class, 'addTask'])->name('candidat.task.add');
    Route::get('/task/get/{id}', [TaskController::class, 'getTask'])->name('candidat.task.see');
    Route::post('/task/candidate/update', [TaskController::class, 'updateTask'])->name('candidat.task.update');
    Route::get('/candidat/task/complete/{id}', [TaskController::class, 'completeTask'])->name('candidat.task.complete');
    Route::get('/task/candidate/delete/{id}', [TaskController::class, 'deleteTask'])->name('candidat.task.delete');

    // JSON 
    Route::get('/getCandidatRdvs', [CandidatController::class, 'getCandidatRdvs'])->name('getCandidatRdvs');
    Route::get('/getCandidatEvents', [CandidatController::class, 'getCandidatEvents'])->name('getCandidatEvents');
    Route::get('/getCandidatFormations', [CandidatController::class, 'getCandidatFormations'])->name('getCandidatFormations');

    // CANDIDATURES
    Route::get('/candidature/{id}', [CandidatureController::class, 'jsonShow'])->name('candidature.json.show');
    Route::get('/candidature/apply/{id}', [CandidatureController::class, 'apply'])->name('candidat.candidature.apply');
    Route::get('/candidature/vitrine/show/{id}', [CandidatureController::class, 'vitrineShow'])->name('candidat.vitrine.show');
    Route::post('/candidat/candidature/create', [CandidatureController::class, 'store'])->name('candidat.candidature.store');

    // OFFERS
    Route::get('/candidat-offers', [OfferController::class, 'index'])->name('candidat.offers');
    Route::get('/candidat-offers/search', [OfferController::class, 'search'])->name('candidat.offers.search');
    Route::get('/candidat-offers/show/{id}', [OfferController::class, 'show'])->name('candidat.offers.show');

    // EVENTS
    Route::get('/event/candidat/subscribe/{id}', [EventController::class, 'subscribeToEvent'])->name('candidat.event.subscribe');
    Route::get('/event/candidat/unsubscribe/{id}', [EventController::class, 'cancelParticipation'])->name('candidat.event.unsubscribe');
    Route::get('/event/candidat/qrcode/{id}', [EventController::class, 'getQrCode'])->name('candidat.event.qrcode');
    Route::get('/event/candidat/show/{id}', [EventController::class, 'showEvent'])->name('candidat.event.show');

    // FORMATIONS
    Route::get('/formation/candidat/subscribe/{id}', [FormationController::class, 'subscribeToFormation'])->name('candidat.formation.subscribe');
    Route::get('/formation/candidat/unsubscribe/{id}', [FormationController::class, 'unsubscribeFromFormation'])->name('candidat.formation.unsubscribe');
    Route::get('/formation/candidat/show/{id}', [FormationController::class, 'show'])->name('candidat.formation.show');

    // EMAILS
    Route::get('/email/candidate/create', [EmailController::class, 'create'])->name('candidat.email.create');
    Route::post('/email/candidate/store', [EmailController::class, 'store'])->name('candidat.email.store');
    Route::get('/email/candidate/soft-delete/{id}', [EmailController::class, 'softDelete'])->name('candidat.email.softDelete');
    Route::get('/email/candidate/show/{id}', [EmailController::class, 'show'])->name('candidat.email.show');
    Route::get('/email/candidate/delete/{id}', [EmailController::class, 'delete'])->name('candidat.email.delete');
    Route::post('/email/candidate/draft', [EmailController::class, 'draft'])->name('candidat.email.draft');


    // DOCUMENTS
    Route::post('/document/candidate/update', [DocumentController::class, 'store'])->name('candidat.document.store');
    Route::get('/document/candidat/delete/{id}', [DocumentController::class, 'delete'])->name('candidat.document.delete');

    // ACCOUNT
    Route::post('/account/candidate/update', [CandidatController::class, 'update'])->name('candidat.account.update');
    Route::get('/account/candidate/avatar/delete', [CandidatController::class, 'deleteAvatar'])->name('candidat.account.avatar.delete');
    Route::post('/account/candidate/password/update', [CandidatController::class, 'updatePassword'])->name('candidat.account.update.password');
    Route::post('/account/candidate/delete', [CandidatController::class, 'deleteAccount'])->name('candidat.account.delete');

    // HISTORY
    Route::get('/candidat-history', [CandidatController::class, 'history'])->name('candidat.history');

});


// Create a route that will addd a auser
Route::get('/create-roles', function () {
    // $role = Role::create(['name' => 'recruiter', 'guard_name' => 'web']);
    // $role = Role::create(['name' => 'candidat', 'guard_name' => 'web']);

    $role = Role::create(['name' => 'limited', 'guard_name' => 'web']);
    $role = Role::create(['name' => 'restricted', 'guard_name' => 'web']);

});


Route::get('/migrate', function () {
    // Run the migration
    Artisan::call('migrate');

    return 'Migration completed successfully';
});

Route::get('/phpinfo', function() {
    phpinfo();
});

Route::get('/cvs', function() {
    $curriculums = Curriculum::all();
    return response()->json(
        $curriculums
    );
});

Route::get('/user', function() {
    $user = auth()->user();
    return response()->json(
        $user
    );
});


Auth::routes();