<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function show(User $user, $filename)
    {
        // find the document from db
        $document = $user->documents()->where('filename', $filename)->get()->first();

        // authorise user making request
        if(0&&! request()->user()->isAdmin()) {
            abort(403);
        }
        // stream the file to the browser
        if($document->extension == 'pdf') {
            return response(diskGet('/documents/' . $user->id . '/' . $filename))
                ->header('Content-Type', 'application/pdf');
        }
    }
}
