<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller; // Import the Controller class from Laravel
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Candidature;
use App\Models\RendezVous;
use App\Models\Offre;
use App\Models\Vues;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CandidatController extends Controller
{
    //
    public function dashboard(){
        $user = auth()->user();
        $jobs = Job::all();
        // $candidatures = Candidature::where('candidat_id', $user->id)->get();
        
        // if($candidatures != null){
        //     $vuesByDay = Candidature::where('candidat_id', $user->id)
        //     ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        //     ->groupBy('date')
        //     ->orderBy('date', 'desc')
        //     ->get();
        //     $vuesByWeek = Candidature::where('candidat_id', $user->id)
        //     ->select(DB::raw('YEARWEEK(created_at) as week'), DB::raw('COUNT(*) as count'))
        //     ->groupBy('week')
        //     ->orderBy('week', 'desc')
        //     ->get();
        //     foreach($vuesByWeek as $key => $value){
        //         $year = substr($value->week, 0, 4);
        //         $week = substr($value->week, -2);
        //         // $weekStart = Carbon::createFromIsoWeekYear($year, $week);
        //         // Start with the first day of the year
        //         $date = Carbon::createFromDate(2023, 1, 1);

        //         // Move to the desired ISO week
        //         $weekStart = $date->setISODate($year, $week);
        //         $weekEnd = $weekStart->addDays(6);

        //     }
        //     $vuesByMonth = Candidature::where('candidat_id', $user->id)
        //     ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as count'))
        //     ->groupBy('month', 'year')
        //     ->orderBy('year', 'desc')
        //     ->orderBy('month', 'desc')
        //     ->get();
        // }else{
        //     $vuesByDay = null;
        //     $vuesByWeek = null;
        //     $vuesByMonth = null;
        // }

        $candidatures = Candidature::where('candidat_id', $user->id)
        ->whereDate('created_at', now()->toDateString())
        ->get();
        // $candidaturesCount = $candidatures->count();
        $candidaturesCount = Vues::whereIn('viewable_id', $candidatures->pluck('id'))->whereDate('created_at', Carbon::today())->count();
        return view('candidat.dashboard', compact('jobs', 'candidaturesCount'));
    }

    public function ajaxViewsPerDay(Request $request){
        $user = auth()->user();
        // $candidatures = Candidature::where('candidat_id', $user->id)
        // ->whereDate('created_at', $request->date)
        // ->count();

        $candidatures = Candidature::where('candidat_id', $user->id)->get();
        $todayVues = Vues::whereIn('viewable_id', $candidatures->pluck('id'))->whereDate('created_at', $request->date)->count();
        
        return response()->json($todayVues);
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
        $offerIds = $histories->pluck('searchable')->toArray();
        $offers = Offre::whereIn('id', $offerIds)->get();

        return view('candidat.history.index', compact('offers'));
    }

    public function stats(Request $request){
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

        // $candidaturesByWeek = [];
        // foreach ($groupedByWeek as $weekStartDate => $candidaturesInWeek) {
        //     $endDate = Carbon::createFromFormat('Y-m-d', $weekStartDate)->endOfWeek()->format('Y-m-d');
        //     $candidaturesByWeek[$weekStartDate . ' | ' . $endDate] = $candidaturesInWeek->count();
        // }

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
       
        $doneCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'done')
            ->count();
        $refusedCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'refused')
            ->count();
        $pendingCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'coming')
            ->count();

        if($request->has('group_by') && $request->has('start_date') && $request->has('end_date')){
            // CANDIDATURES !
            if($request->group_by == 'day' && $request->start_date != null && $request->end_date != null)
            {
                $queryStartDate = $request->start_date;
                $queryEndDate = $request->end_date;
                $candidatures = Candidature::where('candidat_id', $user->id)->whereBetween('created_at', [$queryStartDate, $queryEndDate])->get();

                $candidaturesByDate = $candidatures->groupBy(function ($offer) {
                    return $offer->created_at->format('d-m-Y'); // assuming created_at is a Carbon instance
                })->map(function ($group) {
                    return $group->count();
                });
                
                // order by date 
                $candidaturesByDate = $candidaturesByDate->sortKeys();
                $candidaturesByDay = $candidaturesByDate->toArray();

                $doneCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'done')
                ->whereBetween('created_at', [$queryStartDate, $queryEndDate])
                ->count();
                $refusedCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'refused')
                ->whereBetween('created_at', [$queryStartDate, $queryEndDate])
                ->count();
                $pendingCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'coming')
                ->whereBetween('created_at', [$queryStartDate, $queryEndDate])
                ->count();
            }
            elseif($request->group_by == 'week' && $request->week_start != null && $request->week_end != null)
            {
                // Extract year and week from the input
                list($startYear, $startWeek) = explode('-W', $request->week_start);
                list($endYear, $endWeek) = explode('-W', $request->week_end);

                // Convert the weeks to Carbon instances
                $startDate = Carbon::create($startYear, 1, 1)->addWeek($startWeek - 1)->startOfWeek();
                $endDate = Carbon::create($endYear, 1, 1)->addWeek($endWeek - 1)->endOfWeek();
                // Query Candidature models between the selected weeks
                $candidatures = Candidature::whereBetween('created_at', [$startDate, $endDate])->get();
                
                // Iterate through candidatures and populate the array
                foreach ($candidatures as $candidature) {
                    // Get the start and end dates of the week for the candidature's date
                    $startOfWeek = $candidature->created_at->startOfWeek();
                    $endOfWeek = $candidature->created_at->endOfWeek();

                    // Create a date range string for the week
                    $weekRange = $startOfWeek->format('d-m-Y') . ' - ' . $endOfWeek->format('d-m-Y');

                    // Increment the count for the corresponding week in the array
                    $candidaturesByWeek[$weekRange] = isset($candidaturesByWeek[$weekRange])
                        ? $candidaturesByWeek[$weekRange] + 1
                        : 1;
                }
                $candidaturesByDay = $candidaturesByWeek;

                $doneCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'done')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
                $refusedCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'refused')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
                $pendingCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'coming')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
            }
            elseif($request->group_by == 'month' && $request->month_start != null && $request->month_end != null)
            {
                 // Extract year and month from form inputs
                list($startYear, $startMonth) = explode('-', $request->month_start);
                list($endYear, $endMonth) = explode('-', $request->month_end);

                // Convert the months to Carbon instances
                $startDate = Carbon::createFromDate($startYear, $startMonth, 1)->startOfMonth();
                $endDate = Carbon::createFromDate($endYear, $endMonth, 1)->endOfMonth();

                // Query Candidature models between the selected months
                $candidatures = Candidature::whereBetween('created_at', [$startDate, $endDate])->get();

                // Initialize an array to store counts for each month
                $candidaturesByMonth = [];

                // Iterate through candidatures and populate the array
                foreach ($candidatures as $candidature) {
                    // Get the start and end dates of the month for the candidature's date
                    $monthYear = $candidature->created_at->format('m-Y');

                    // Increment the count for the corresponding month and year in the array
                    $candidaturesByMonth[$monthYear] = isset($candidaturesByMonth[$monthYear])
                    ? $candidaturesByMonth[$monthYear] + 1
                    : 1;
                }

                // Now $candidaturesByMonth contains the count of candidatures for each month (start date - end date)
                $candidaturesByDay = $candidaturesByMonth;

                $doneCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'done')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
                $refusedCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'refused')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
                $pendingCandidatures = Candidature::where('candidat_id', $user->id)->where('status', 'coming')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
            }

            // RDVS
            if($request->group_by == 'day' && $request->start_date != null && $request->end_date != null){
                $queryStartDate = $request->start_date;
                $queryEndDate = $request->end_date;

                $doneRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'Effectué')
                    ->whereBetween('date', [$queryStartDate, $queryEndDate])
                    ->count();

                $refusedRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'Annulé')
                    ->whereBetween('date', [$queryStartDate, $queryEndDate])
                    ->count();

                $pendingRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'En attente')
                    ->whereBetween('date', [$queryStartDate, $queryEndDate])
                    ->count();

            }
            elseif ($request->group_by == 'week' && $request->week_start != null && $request->week_end != null) {
                list($startYear, $startWeek) = explode('-W', $request->week_start);
                list($endYear, $endWeek) = explode('-W', $request->week_end);
            
                $startDate = Carbon::create($startYear, 1, 1)->addWeek($startWeek - 1)->startOfWeek();
                $endDate = Carbon::create($endYear, 1, 1)->addWeek($endWeek - 1)->endOfWeek();
            
                $doneRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'Effectué')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();
            
                $refusedRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'Annulé')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();
            
                $pendingRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'En attente')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();
            }
            elseif ($request->group_by == 'month' && $request->month_start != null && $request->month_end != null) {
                list($startYear, $startMonth) = explode('-', $request->month_start);
                list($endYear, $endMonth) = explode('-', $request->month_end);
            
                $startDate = Carbon::create($startYear, $startMonth, 1)->startOfMonth();
                $endDate = Carbon::create($endYear, $endMonth, 1)->endOfMonth();
            
                $doneRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'Effectué')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->count();
            
                $refusedRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'Annulé')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->count();
            
                $pendingRdvs = RendezVous::where('candidat_it', $user->id)
                    ->where('status', 'En attente')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->count();
            }

        }

        return view('candidat.stats.index', compact('doneRdvs', 'refusedRdvs', 'pendingRdvs',
        'doneCandidatures', 'refusedCandidatures', 'pendingCandidatures',
        'candidaturesByDay', 'candidaturesByMonth'));
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
