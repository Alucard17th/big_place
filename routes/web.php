<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecruiterController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

use App\Models\Job;

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
        echo '______________________________________<br>';

        $full_name = $item->Metier ?? ''; // Use an empty string as a default value if "Metier" is missing
        $code_ogr = $item->Code;

        Job::create([
            'full_name' => $item->Metier,
            'code_ogr' => $code_ogr
        ]);
    }
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/mag', [HomeController::class, 'mag'])->name('mag');
Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::get('/parrainage', [HomeController::class, 'parrainage'])->name('parrainage');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/register-candidat', [HomeController::class, 'registerAsCandidat'])->name('register-as-candidat');
Route::get('/register-employeur', [HomeController::class, 'registerAsRecruiter'])->name('register-as-recruiter');


// RECRUITER
Route::group(['middleware' => ['role:recruiter']], function () {
    //
    Route::get('/recruiter-dashboard', function () {
        return view('recruiter.dashboard');
    });
    Route::get('/cv-theque', [RecruiterController::class, 'cvtheque'])->name('recruiter.cvtheque');
    Route::get('/cv-theque-search', [RecruiterController::class, 'cvthequeSearch'])->name('recruiter.cvtheque.search');
    Route::get('/mes-favoris', [RecruiterController::class, 'myFavorites'])->name('recruiter.favorites');
    Route::get('/mes-offres-emploi', [RecruiterController::class, 'myJobOffers'])->name('recruiter.offres');
    Route::get('/ma-vitrine', [RecruiterController::class, 'myVitrine'])->name('recruiter.vitrine');
    Route::get('/mes-rendez-vous', [RecruiterController::class, 'myRdv'])->name('recruiter.rendez-vous');
    Route::get('/mon-rendez-vous/{id}', [RecruiterController::class, 'seeMyRdv'])->name('recruiter.rendez-vous.see');
    Route::get('/mes-documents', [RecruiterController::class, 'myDocuments'])->name('recruiter.documents');
    
    Route::post('/cv-theque/add-favorite', [RecruiterController::class, 'cvthequeAddFavorite'])->name('recruiter.cvtheque.add.favorite');
    Route::post('/favorties/invite-candidates', [RecruiterController::class, 'inviteCandidates'])->name('recruiter.invite.candidates');
    Route::post('/document/add', [RecruiterController::class, 'addDocument'])->name('recruiter.document.add');
    Route::post('/commentaire/add', [RecruiterController::class, 'addCommentaire'])->name('recruiter.commentaire.add');
    Route::post('/ma-vitrine/update', [RecruiterController::class, 'updateVitrine'])->name('recruiter.update.vitrine');


});

// CANDIDAT
Route::group(['middleware' => ['role:candidat']], function () {
    //
    Route::get('/candidat-dashboard', function () {
        return view('candidat.dashboard');
    });
});

// Create a route that will addd a auser
Route::get('/create-roles', function () {
    $role = Role::create(['name' => 'recruiter', 'guard_name' => 'web']);
    $role = Role::create(['name' => 'candidat', 'guard_name' => 'web']);
});


Route::get('/migrate', function () {
    // Run the migration
    Artisan::call('migrate');

    return 'Migration completed successfully';
});

Auth::routes();