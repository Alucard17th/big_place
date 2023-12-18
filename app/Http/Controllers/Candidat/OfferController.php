<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;

class OfferController extends Controller
{
    //

    public function index(){
        $offres = Offre::all();
        return view('candidat.offers.index', compact('offres'));
    }

    public function search(Request $request){
         // Start with a base query for the Offre model
        $query = Offre::query();

        // Check each search parameter and apply the filter if it's present
        if ($request->filled('job_title')) {
            $query->where('job_title', 'like', '%' . $request->input('job_title') . '%');
        }

        if ($request->filled('location_city')) {
            $query->where('location_city', 'like', '%' . $request->input('location_city') . '%');
        }

        if ($request->filled('brut_salary')) {
            $query->where('brut_salary', '=', $request->input('brut_salary'));
        }

        if ($request->filled('education_level')) {
            $query->where('education_level', '=', $request->input('education_level'));
        }

        if ($request->filled('experience_level')) {
            $query->where('experience_level', '=', $request->input('experience_level'));
        }

        // Repeat the process for other search parameters

        // Get the results
        $offres = $query->get();
        // Return the results or pass them to a view
        return view('candidat.offers.index', compact('offres'));
        // $search = $request->input('search');
        // $offres = Offre::where('project_campaign_name', 'like', '%'.$search.'%')->get();
        // return view('candidat.offers.index', compact('offres'));
    }
}
