<?php 

use App\Models\User;

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