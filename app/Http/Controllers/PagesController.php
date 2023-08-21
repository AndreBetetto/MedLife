<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function aboutUs()
    {
        return view('default-pages.aboutUs');
    }
}
