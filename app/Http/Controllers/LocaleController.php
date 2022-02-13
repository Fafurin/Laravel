<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function index(Request $request, $locale){
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}
