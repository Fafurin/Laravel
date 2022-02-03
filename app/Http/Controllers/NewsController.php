<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index(){
//        $news = News::with('category')->get();
//        $item = News::where('category_id', 1)->get()->find(4);

            $item = News::getOneNews(1,4);



//        $item = News::find(3);
        dd($item);

//        foreach($news as $item){
//            dump($item->title);
//        }

//        $item = News::find(1);
//        $item = News::where('id', 3)
//            ->get();
//        dd($item);
    }

    public function list(int $categoryId){
        return view('news', ['news' => News::getByCategoryId($categoryId)]);
    }

    public function getOneNews(int $categoryId, int $newsId){
        return view('getNews', ['item' => News::getOneNews($categoryId, $newsId)]);
    }
}
