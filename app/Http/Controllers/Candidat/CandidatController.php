<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller; // Import the Controller class from Laravel
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Candidature;
use App\Models\RendezVous;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{
    //
    public function dashboard(){
        $user = auth()->user();
        $jobs = Job::all();
        return view('candidat.dashboard', compact('jobs'));
    }

    public function getCandidatRdvs(){
        $user = auth()->user();
        $rdvs = $user->rendezvous;
        return response()->json($rdvs);
    }

    public function getCandidatEvents(){
        $user = auth()->user();
        $events = $user->events;
        return response()->json($events);
    }

    public function getCandidatFormations(){
        $user = auth()->user();
        $formations = $user->formations;
        return response()->json($formations);
    }

    public function account(){
        $user = auth()->user();
        return view('candidat.account.index', compact('user'));
    }

    public function update(Request $request){
        $user = auth()->user();
        $user->name = $request->name;
        $user->birth_date = $request->birth;

        $userId = auth()->user()->id;

        // Get the uploaded file
        $file = $request->file('avatar');

        // Generate a unique filename
        $fileName = $userId . '-' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the user's directory within the storage/app/public directory
        $filePath = $file->storeAs('public/uploads/' . $userId, $fileName);

        $user->avatar = $filePath;

        $user->save();
        toast('Vos informations ont bien été mises à jour', 'success');
        return redirect()->back();
    }

    public function deleteAvatar(){
        $user = auth()->user();
        $user->avatar = null;
        $user->save();
        toast('Votre avatar a bien été supprimé', 'success');
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


    public function history(){
        // $histories = auth()->user()->history;
        $histories = auth()->user()->history()
        ->where(function ($query) {
            $query->whereNotNull('searchable')
                  ->whereExists(function ($subquery) {
                      $subquery->select(DB::raw(1))
                               ->from('offres')
                               ->whereRaw('offres.id = histories.searchable');
                  });
        })
        ->get();
        return view('candidat.history.index', compact('histories'));
    }

    public function stats(){
        $user = auth()->user();
       
        $doneRdvs = $user->rendezvous()->where('status', 'Effectué')->count();
        $refusedRdvs = $user->rendezvous()->where('status', 'Annulé')->count();

        $candidature = Candidature::where('candidat_id', $user->id)->count();
   
        $moyenneDureeRecrutement = 555;

        $dureeSusbcription = 555;
        return view('candidat.stats.index', compact('doneRdvs','refusedRdvs', 'candidature', 'dureeSusbcription', 'moyenneDureeRecrutement'));
    }

    public function chooseCreneau($time){
        $rdv = RendezVous::find($time);
        return view('candidat.creneau.index', compact('rdv'));
    }

    public function confirmCreneau($id){
        $rdv = RendezVous::find($id);

        if($rdv->status == 'En attente'){
            $rdv->status = 'A venir';
            $rdv->participant = auth()->user()->id;
            $rdv->candidat_it = auth()->user()->id;
            $rdv->save();
            toast('Votre rendez-vous a bien été confirme', 'success');
        }else{
            toast('Ce créneau est déja réservé', 'error');
        }

        return redirect()->back();
    }
}
