<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Validation\Rule;


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

        // $request->validate([
        //     'phone' => [
        //         'required',
        //         'string',
        //         'regex:/^\d{10}$/',
        //         Rule::unique('curricula')->ignore($user->curriculum()->value('id')),
        //     ],
        // ]);

        $curriculum = $user->curriculum()->updateOrCreate(
            // Search criteria to find the record to update
            ['user_id' => $user->id],
    
            // Values to update or create
            [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'ville_domiciliation' => $request->ville_domiciliation,
                // 'metier_recherche' => isset($request->job_title) ? $request->job_title  : '',
                // 'custom_job' => isset($request->custom_job) ? $request->custom_job  : '',
                'pretentions_salariales' => $request->pretentions_salariales,
                'annees_experience' => $request->annees_experience,
                'niveau' => $request->niveau,
                'niveau_etudes' => $request->niveau_etudes,
                'valeurs' => json_encode($request->valeurs),
                'phone' => $request->phone,
            ]
        );

        $user->update([
            'phone' => $request->phone,
        ]);

        toast('Vos informations ont bien été enregistrées','success')->autoClose(5000);

        return redirect()->back();
    }

    public function saveCvFile(Request $request){
        $user = auth()->user();
        $curriculum = $user->curriculum()->first();
        if($request->has('cv')) {
            $fileInfos = Filepond::field($request->cv)->moveTo('/uploads/'.$user->id.'/cv_'.uniqid());

            $curriculum = $user->curriculum()->updateOrCreate(
                // Search criteria to find the record to update
                ['user_id' => $user->id],
        
                // Values to update or create
                [
                    'cv' => $fileInfos['location'],
                    'phone' => $user->phone,
                ]
            );

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
