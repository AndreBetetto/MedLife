<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function benefit()
    {
        return view('default-pages.benefit');
    }

    public function values()
    {
        return view('default-pages.values');
    }

    public function doctors()
    {
        return view('default-pages.doctors');
    }

    public function contactUs()
    {
        return view('default-pages.contactUs');
    }

    public function aboutUs()
    {
        return view('default-pages.aboutUs');
    }

    public function sobreNos()
    {
        return view('sobreNos');
    }
}
