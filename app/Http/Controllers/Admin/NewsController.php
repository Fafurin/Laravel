<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news', ['news' => News::getNews()]);
    }

    public function create(){
        return view('admin.create', ['news' => New News()]);
    }

    public function save(Request $request){
        $news = News::create([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'category_id' => $request->input('category'),
            'source_id' => $request->input('source'),
            'status_id' => $request->input('status'),
            'content' => $request->input('content'),
            'image' => $request->input('image'),
            'publish_date' => date("Y-m-d H:i:s")
        ]);
        $news->save();
        return redirect()->route('admin::news::index');
    }

    public function update(News $news){
        return view('admin.create', ['news' => $news]);
    }

    public function delete($id){
        News::deleteNews($id);
        return redirect()->route('admin::news::index');

    }

}