<?php 

use App\Models\User;
use App\Models\Offre;
use App\Models\Entreprise;

if (!function_exists('getUserEmailById')) {
    function getUserEmailById(string $id = null)
    {
        if ($id != null) {
            $user = User::where('id', $id)->first();
            return $user->email;
        } else {
            return '';
        }
    }
}

if (!function_exists('getUserById')) {
    function getUserById(string $id = null)
    {
        if ($id != null) {
            $user = User::where('id', $id)->first();
            return $user;
        } else {
            return '';
        }
    }
}

if (!function_exists('getOfferByCandidatId')) {
    function getOfferByCandidatId(string $id = null)
    {
        if ($id != null) {
            $user = Offre::where('id', $id)->first();
            return $user;
        } else {
            return '';
        }
    }
}

if (!function_exists('getEntrepriseByUserID')) {
    function getEntrepriseByUserID(string $id = null)
    {
        if ($id != null) {
            $user = Entreprise::where('user_id', $id)->first();
            return $user;
        } else {
            return '';
        }
    }
}