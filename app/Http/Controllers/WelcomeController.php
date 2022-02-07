<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function locale($locale){
        \App::setLocale($locale);
        return view('welcome');
    }

}
