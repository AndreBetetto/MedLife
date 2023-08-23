<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutUs(Request $request): View
    {
        return view('default-pages.aboutUs');
    }
}
