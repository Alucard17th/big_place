<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RahulHaque\Filepond\Facades\Filepond;

class CurriculumController extends Controller
{
    //
    public function cvredirect(){
        $user = auth()->user();
        $curriculum = $user->curriculum()->first();
        return view('candidat.cvredirect', compact('curriculum'));
    }

    public function curriculumStore(Request $request){
        $user = auth()->user();
        $curriculum = $user->curriculum()->updateOrCreate(
            // Search criteria to find the record to update
            ['user_id' => $user->id],
    
            // Values to update or create
            [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'ville_domiciliation' => $request->ville_domiciliation,
                'metier_recherche' => $request->metier_recherche,
                'pretentions_salariales' => $request->pretentions_salariales,
                'annees_experience' => $request->annees_experience,
                'niveau' => $request->niveau,
                'niveau_etudes' => $request->niveau_etudes,
                'valeurs' => json_encode($request->valeurs),
            ]
        );

        toast('Curriculum uploaded','success')->autoClose(5000);

        return redirect()->back();
    }

    public function saveCvFile(Request $request){
        $user = auth()->user();
        $curriculum = $user->curriculum()->first();
        if($request->has('cv')) {
            $fileInfos = Filepond::field($request->cv)->moveTo('/uploads/'.$user->id.'/cv_'.uniqid());
            $curriculum->cv = $fileInfos['location'];
            $curriculum->save();

            $user->documents()->create([
                'name' => $fileInfos['basename'],
                'file' => $fileInfos['location'],
                'type' => 'cv',
            ]);
        }else{
            $curriculum->cv = null;
            $curriculum->save();
        }

        toast('Votre CV a bien été enregistre','success')->autoClose(5000);

        return redirect()->back();
    }
}
