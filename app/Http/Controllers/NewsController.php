<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('publish_date', 'desc')
            ->paginate(10);
        return view('allNews', ['news' => $news]);
    }

    public function list(int $categoryId){
        return view('news', ['news' => News::getByCategoryId($categoryId)]);
    }

    public function getOneNews(int $categoryId, int $newsId){
        return view('getNews', ['item' => News::getOneNews($categoryId, $newsId)]);
    }
}
