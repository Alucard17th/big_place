<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $formations = Formation::where('status', 'Active')->get();
        $userFormations = auth()->user()->participationFormations;
        return view('candidat.formations.index', compact('formations', 'userFormations'));
    }

    public function subscribeToFormation($id){
        $formation = Formation::find($id);
        $user = auth()->user();
        // Check if the user is already attached to the formation
        if($formation->subscribers >= $formation->max_participants){
            toast('La formation est pleine.', 'info');
            return redirect()->back();
        }

        if (!$user->participationFormations->contains($formation)) {
            // If not, attach the formation
            $user->participationFormations()->attach($formation, ['status' => 'En Attente']);
            $formation->subscribers = $formation->subscribers + 1;
            $formation->save();

            // You can also perform additional actions if needed
            toast('Votre souscription a bien été prise en compte.', 'success');
        } else {
            toast('Vous êtes déjà inscrit.', 'info');
        }
        // $user->participationFormations()->attach($formation);
        return redirect()->back();
    }

    public function unsubscribeFromFormation($id){
        $formation = Formation::find($id);
        $user = auth()->user();
        $user->participationFormations()->detach($formation);
        $formation->subscribers = $formation->subscribers - 1;
        $formation->save();
        toast('Votre souscription a bien été annulée.', 'success');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $formation = Formation::find($id);
        return view('candidat.formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
