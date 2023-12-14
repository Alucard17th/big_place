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
}
