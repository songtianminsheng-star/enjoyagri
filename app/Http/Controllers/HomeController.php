<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () 
    {
        return view('welcome', [
            'title' => 'ENJOYagri',
            'message' => 'Controllerからデータを渡しています。'
        ]);
    }

    public function about ()
    {
        return view('about', [
            'title' => 'About',
            'message' => 'Aboutページです'
        ]);
    }

    public function contact () 
    {
        return view('contact', [
            'title' => 'Contact',
            'message' => 'Contactページです。'
        ]);
    }
}