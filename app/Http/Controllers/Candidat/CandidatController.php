<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller; // Import the Controller class from Laravel
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Candidature;
use App\Models\RendezVous;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CandidatController extends Controller
{
    //
    public function dashboard(){
        $user = auth()->user();
        $jobs = Job::all();
        $candidatures = Candidature::where('candidat_id', $user->id)->get();
        if($candidatures != null){
            $vuesByDay = Candidature::where('candidat_id', $user->id)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();
            $vuesByWeek = Candidature::where('candidat_id', $user->id)
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
            $vuesByMonth = Candidature::where('candidat_id', $user->id)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        }else{
            $vuesByDay = null;
            $vuesByWeek = null;
            $vuesByMonth = null;
        }
        // dd($candidatures, $vuesByDay, $vuesByWeek, $vuesByMonth);
        return view('candidat.dashboard', compact('jobs', 'vuesByDay', 'vuesByWeek', 'vuesByMonth'));
    }

    public function getCandidatRdvs(){
        $user = auth()->user();
        // $rdvs = $user->rendezvous;
        $rdvs = RendezVous::where('candidat_it', $user->id)->get();
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
        $doneRdvs = RendezVous::where('candidat_it', $user->id)->where('status', 'Effectué')->count();
        $refusedRdvs = RendezVous::where('candidat_it', $user->id)->where('status', 'Annulé')->count();
        $pendingRdvs = RendezVous::where('candidat_it', $user->id)->where('status', 'En attente')->count();
        // $doneRdvs = $user->rendezvous()->where('status', 'Effectué')->count();
        // $refusedRdvs = $user->rendezvous()->where('status', 'Annulé')->count();

        $candidatures = Candidature::where('candidat_id', $user->id)->get();
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $days = range(1, Carbon::create($currentYear, $currentMonth)->daysInMonth);
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
        // OFFERS BY DAY
        $groupedByDay = $candidatures->groupBy(function ($item) {
            return $item->created_at->toDateString(); // Assuming 'created_at' is your timestamp field
        });
        $candidaturesByDay = [];
        foreach ($days as $day) {
            $dateString = Carbon::create($currentYear, $currentMonth, $day)->toDateString();
            $candidaturesByDay[$dateString] = $groupedByDay->get($dateString, collect())->count();
        }
        // OFFERS BY WEEK
        $groupedByWeek = $candidatures->groupBy(function ($item) {
            return $item->created_at->startOfWeek()->format('Y-m-d');
        });

        $candidaturesByWeek = [];
        foreach ($groupedByWeek as $weekStartDate => $candidaturesInWeek) {
            $endDate = Carbon::createFromFormat('Y-m-d', $weekStartDate)->endOfWeek()->format('Y-m-d');
            $candidaturesByWeek[$weekStartDate . ' | ' . $endDate] = $candidaturesInWeek->count();
        }

        // OFFERS BY MONTH
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
        // dd($candidaturesByDay, $candidaturesByWeek, $candidaturesByMonth);
       
        $doneCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'done')->count();
        $refusedCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'refused')->count();
        $pendingCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'coming')->count();

        return view('candidat.stats.index', compact('doneRdvs', 'refusedRdvs', 'pendingRdvs',
        'doneCandidatures', 'refusedCandidatures', 'pendingCandidatures',
        'candidaturesByDay', 'candidaturesByWeek', 'candidaturesByMonth'));
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
