<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function index(){

    }

    public function list(int $categoryId){
        if (Session::has('locale')) {
            \App::setLocale(Session::get('locale'));
        }
        return view('news', ['news' => News::getByCategoryId($categoryId)]);
    }

    public function getOneNews(int $categoryId, int $newsId){
        return view('getNews', ['item' => News::getOneNews($categoryId, $newsId)]);
    }
}
