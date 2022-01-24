<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = (new News())->getNews();
        return view('news', ['news' => $news]);
    }

    public function getNews($id){
        $news = (new News())->getOne($id);
        return view('getNews', ['news' => $news]);
    }
}
