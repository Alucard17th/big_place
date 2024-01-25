<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Offre;

class FavoritesController extends Controller
{
    //
    public function favoris(){
        $user = auth()->user();
        $favoriteIds = json_decode($user->favorites->pluck('favorites')->first(), true) ?? [];
        $favorites = Offre::whereIn('id', $favoriteIds)->get();
        return view('candidat.favorites.favorites', compact('favorites'));
    }

    public function addToFavorites(Request $request){
         // create or update Favorite based on the auth user id as user_id in Favorite model
         $favorite = Favorite::where('user_id', auth()->user()->id)->first();
         // dd(json_decode($favorite->favorites), $request->selectedValues);
         if ($favorite) {
             // update favorite
            //  $favsMerged = array_merge( json_decode($favorite->favorites), $request->selectedValues);
            $favsMerged = array_unique(array_merge(json_decode($favorite->favorites), $request->selectedValues));

             $favorite->favorites = $favsMerged;
             $favorite->save();
         }else{
             $favorite = new Favorite();
             $favorite->user_id = auth()->user()->id;
             $favorite->favorites = json_encode($request->selectedValues);
             $favorite->save();
         }
        
         toast('Les favoris ont bien été ajoutés.','success')->autoClose(5000);
         // return a json success response 
         return response()->json([
             'status' => 'success',
         ]);
    }

    public function removeFromFavorites(Request $request){
        $favorite = Favorite::where('user_id', auth()->user()->id)->first();
        $favsMerged = array_diff(json_decode($favorite->favorites), $request->selectedValues);
        $favorite->favorites = $favsMerged;
        $favorite->save();
        toast('Les favoris ont bien été supprimés.','success')->autoClose(5000);
        // return a json success response 
        return response()->json([
            'status' => 'success',
        ]);
    }
}
