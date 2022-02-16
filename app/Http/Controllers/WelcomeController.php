<?php

namespace App\Http\Controllers;

use App\Models\News;

class WelcomeController extends Controller
{
    public function index(){
        $news = News::orderBy('publish_date', 'desc')
            ->paginate(10);
        return view('welcome', ['news' => $news]);
    }

}
