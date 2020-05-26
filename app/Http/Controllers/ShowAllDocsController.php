<?php

namespace App\Http\Controllers;

use App\Document;

class ShowAllDocsController extends Controller
{
    public function __invoke()
    {
        $documents = (new Document())->get();

        return view('home', [
            'documents' => $documents
        ]);

    }
}
