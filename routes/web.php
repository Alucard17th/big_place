<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

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
});

Route::group(['middleware' => ['role:candidat']], function () {
    //
    Route::get('/candidat-dashboard', function () {
        return view('candidat.dashboard');
    });
});




// Create a route that will addd a auser
Route::get('/create-roles', function () {
    $role = Role::create(['name' => 'recruiter']);
    $role = Role::create(['name' => 'candidat']);
});


Route::get('/migrate', function () {
    // Run the migration
    Artisan::call('migrate');

    return 'Migration completed successfully';
});


Auth::routes();

