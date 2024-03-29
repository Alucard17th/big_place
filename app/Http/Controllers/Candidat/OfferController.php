<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\History;
use Carbon\Carbon;

class OfferController extends Controller
{
    //

    public function index(){
        $offers = Offre::all();
        return view('candidat.offers.index', compact('offers'));
    }

    // public function search(Request $request){
    //      // Start with a base query for the Offre model
    //     $query = Offre::query();

    //     // Check each search parameter and apply the filter if it's present
    //     if ($request->filled('job_title')) {
    //         $query->where('rome_code', 'like', '%' . $request->input('job_title') . '%');
    //     }

    //     if ($request->filled('location_city')) {
    //         $query->where('location_city', 'like', '%' . $request->input('location_city') . '%');
    //     }

    //     // if ($request->filled('brut_salary')) {
    //     //     dd($request->input('brut_salary'));
    //     //     $query->where('brut_salary', '=', $request->input('brut_salary'));
    //     // }
    //     if ($request->filled('brut_salary')) {
    //         // Extract the minimum and maximum values from the interval
    //         [$minSalary, $maxSalary] = explode('-', str_replace(' ', '', $request->input('brut_salary')));
        
    //         // Use whereBetween to filter by the range
    //         $query->whereBetween('brut_salary', [$minSalary, $maxSalary]);
    //     }

    //     if ($request->filled('education_level')) {
    //         $query->where('education_level', '=', $request->input('education_level'));
    //     }

    //     if ($request->filled('experience_level')) {
    //         $query->where('experience_level', '=', $request->input('experience_level'));
    //     }

    //     if ($request->filled('valeurs')) {
    //         $query->where(function ($query) use ($searchTerm) {
    //             $query->orWhereJsonContains('valeurs', $request->input('valeurs'));
    //         });
    //     }

    //     // Repeat the process for other search parameters

    //     // Get the results
    //     $offres = $query->get();
    //     // Return the results or pass them to a view
    //     return view('candidat.offers.index', compact('offres'));
    //     // $search = $request->input('search');
    //     // $offres = Offre::where('project_campaign_name', 'like', '%'.$search.'%')->get();
    //     // return view('candidat.offers.index', compact('offres'));
    // }

    public function show($id){
        $offer = Offre::find($id);
        $routeName = url()->previous();

        $user = auth()->user();
        $existingRecord = History::where('user_id', $user->id)
        ->where('searchable', $id)
        ->where('created_at', '>', Carbon::now()->subDay())
        ->first();
        if (!$existingRecord) {
            $history = new History();
            $history->user_id = $user->id;
            $history->searchable = $id;
            $history->save();
        }

        return view('candidat.offers.show', compact('offer', 'routeName'));
    }

    public function showForFavorite($id){
        $offer = Offre::find($id);

        $user = auth()->user();
        $existingRecord = History::where('user_id', $user->id)
        ->where('searchable', $id)
        ->where('created_at', '>', Carbon::now()->subDay())
        ->first();
        if (!$existingRecord) {
            $history = new History();
            $history->user_id = $user->id;
            $history->searchable = $id;
            $history->save();
        }

        return view('candidat.favorites.show', compact('offer'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->all();
    
        // Create a query builder instance
        $query = Offre::query();
    
        // Execute the query and get the results
        $offers = $query->get();
        
        $total_possible_score = 70;
    
        // Iterate over the offers
        foreach ($offers as $offer) {
            $score = 0; // Initialize score for each offer
    
            // Apply search conditions for each field
            if (!empty($searchTerm['job_title'])) {
                $score += strpos($offer->rome_code, $searchTerm['job_title']) !== false ? 10 : 0;
            }

            // if (!empty($searchTerm['custom_job']) && $searchTerm['custom_job'] != '') {
            //     $score += strpos($offer->rome_code, $searchTerm['custom_job']) !== false ? 10 : 0;
            // }

            if (!empty($searchTerm['custom_job']) && $searchTerm['custom_job'] != '') {
                $searchTermLower = strtolower($searchTerm['custom_job']); // Convert search term to lowercase
                $searchTermLower = $this->removeAccents($searchTermLower); // Remove accents from search term

                // Convert job title to lowercase and remove accents, then perform case-insensitive comparison
                $offerJobTitleLower = strtolower($offer->job_title);
                $offerJobTitleLower = $this->removeAccents($offerJobTitleLower);
                $score += stripos($offerJobTitleLower, $searchTermLower) !== false ? 10 : 0;
            }
          
            if (!empty($searchTerm['location_city'])) {
                $score += strpos($offer->location_city, $searchTerm['location_city']) !== false ? 10 : 0;
            }
    
            // if (!empty($searchTerm['brut_salary'])) {
            //     [$minSalary, $maxSalary] = explode('-', str_replace(' ', '', $searchTerm['brut_salary']));
            //     $score += ($offer->brut_salary >= $minSalary && $offer->brut_salary <= $maxSalary) ? 10 : 0;
            // }
            if (!empty($searchTerm['brut_salary'])) {
              
                // Explode the offer's brut salary to get minimum and maximum values
                $salaryParts = explode(' - ', $offer->brut_salary);

                if (count($salaryParts) === 2) {
                    // Extract minimum and maximum salary values
                    [$minOfferSalary, $maxOfferSalary] = $salaryParts;

                    // Check if the extracted values are not empty
                    if (!empty($minOfferSalary) && !empty($maxOfferSalary)) {
                        // Check if the submitted salary falls within the offer's salary interval
                        $score += ($searchTerm['brut_salary'] >= $minOfferSalary && $searchTerm['brut_salary'] <= $maxOfferSalary) ? 10 : 0;
                    }
                } else {
                    // If the offer's salary is a single value
                    $score += ($searchTerm['brut_salary'] == $offer->brut_salary) ? 10 : 0;
                }
            }
    
            if (!empty($searchTerm['education_level'])) {
                $score += ($offer->education_level == $searchTerm['education_level']) ? 10 : 0;
            }
    
            if (!empty($searchTerm['experience_level'])) {
                $score += ($offer->experience_level == $searchTerm['experience_level']) ? 10 : 0;
            }
    
            if (!empty($searchTerm['valeurs'])) {
                $decodedValeurs = json_decode($offer->valeurs, true);
                $score += is_array($decodedValeurs) && in_array($searchTerm['valeurs'], $decodedValeurs) ? 10 : 0;
            }
    
            // Repeat the process for other search parameters
    
            // Calculate the matching percentage for the current offer
            $offer->matching_percentage = ($score / $total_possible_score) * 100;
        }

        // Sort the offers by matching percentage
        // $offers = $offers->toArray();
        // usort($offers, function ($a, $b) {
        //     return $b['matching_percentage'] <=> $a['matching_percentage'];
        // });

        // Sort offers by matching percentage in descending order
        $offers = $offers->sortByDesc('matching_percentage');

        // Filter out offers with a matching percentage of 0
        $offers = $offers->filter(function ($offer) {
            return $offer->matching_percentage > 0;
        });

        $isSearch = true;
        // Return the results or pass them to a view
        return view('candidat.offers.index', compact('offers', 'isSearch'));
    }

    function removeAccents($str) {
        $accents = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        $noAccents = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
        $str = str_replace($accents, $noAccents, $str);
        return $str;
    }

}
