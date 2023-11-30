<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    //
    public function favoris(){
        $user = auth()->user();
        $favorites = $user->favorites;
        return view('candidat.favorites.favorites', compact('favorites'));
    }
}
