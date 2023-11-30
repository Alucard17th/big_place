<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //
    public function documents(){
        $user = auth()->user();
        $documents = $user->documents;
        return view('candidat.documents.documents', compact('documents'));
    }
}
