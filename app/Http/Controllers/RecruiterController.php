<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;

class RecruiterController extends Controller
{
    //

    public function cvtheque(){
        $curriculums = Curriculum::all();
        return view('recruiter.cvtheque', compact('curriculums'));
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
            $query->where('ville_domiciliation', 'like', '%' . $searchTerm['ville_domiciliation'] . '%');
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
        if (!empty($searchTerm['valeur'])) {
            $query->where('valeurs->valeur', 'like', '%' . $searchTerm['valeur'] . '%');
        }

        $curriculums = $query->get();
        return view('recruiter.cvtheque', compact('curriculums'));
        
    }
}
