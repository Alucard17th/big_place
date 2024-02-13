<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
class AdminController extends Controller
{
    //

    public function createUser(Request $request){
        try {
            $adminUser = auth()->user();
            $adminEntrepriseId = $adminUser->entreprise->first()->id;
    
            $user = new User();
            $user->name = $request->input('name') . ' ' . $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->function = $request->input('function');
            $user->parent_entreprise_id = $adminEntrepriseId;
            $user->assignRole($request->input('role'));
            $user->save();
    
            toast('Utilisateur ajouté avec succès.','success')->autoClose(5000);
            return redirect()->back();

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                // Duplicate entry error (Integrity constraint violation)
                toast('L\'adresse e-mail existe déjà.','error')->autoClose(5000);
                return redirect()->back();
            } else {
                // Other database errors
                toast('Une erreur est survenue lors de la création de l\'utilisateur.','error')->autoClose(5000);
                return redirect()->back();
            }
        }
    }
}
