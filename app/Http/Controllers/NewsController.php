<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function getNewsByCatId(int $cat_id){
        $news = (new News())->getByCategoryId($cat_id);
        return view('news', ['news' => $news]);
    }

    public function getOneNews(int $cat_id, int $id){
        $item = (new News())->getOne($cat_id, $id);
        return view('getNews', ['item' => $item]);
    }

}
