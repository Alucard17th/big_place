<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    //
    public function documents(){
        $user = auth()->user();
        $documents = $user->documents;
        return view('candidat.documents.documents', compact('documents'));
    }

    public function store(Request $request){
        // Get the user ID, assuming you have authentication in place
        $user = auth()->user();
        $userId = auth()->user()->id;

        // Get the uploaded file
        $file = $request->file('document');

        // Generate a unique filename
        $fileName = $userId . '-' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the user's directory within the storage/app/public directory
        $filePath = $file->storeAs('public/uploads/' . $userId, $fileName);

        $user->documents()->create([
            'name' => $fileName,
            'file' => $filePath,
            'type' => 'document',
            'label' => $request->label,
        ]);

        toast('Votre document a bien été ajouté','success')->autoClose(5000);

        return redirect()->back();
    }

    // public function stream($id){
    //     $document = Document::find($id);
    //     $filePath = storage_path('app/public/' . $document->file);

    //     return response()->file($filePath);
    // }

    // public function download($id){
    //     $document = Document::find($id);
    //     $filePath = storage_path('app/public/' . $document->file);

    //     return response()->download($filePath, $document->original_name);
    // }

    public function delete($id){
        $document = Document::find($id);
        $document->delete();
        toast('Votre document a bien été supprimé','success')->autoClose(5000);
        return redirect()->back();
    }
}
