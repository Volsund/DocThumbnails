<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowAllDocsController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }
}
