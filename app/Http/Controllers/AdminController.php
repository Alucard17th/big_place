<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //

    public function createUser(Request $request){
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
    }
}
