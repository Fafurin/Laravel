<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use App\Models\Status;
use App\Http\Requests\AdminNewsSaveRequest;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('publish_date', 'desc')
            ->paginate(20);
        return view('admin.news.index', ['news' => $news]);
    }

    public function create(Category $category, Status $status){
        return view("admin.news.create", [
                'model' => new News(),
                'categories' => $category->getList(),
                'statuses' => $status->getList(),
                'is_succeed' => session('success'),
            ]
        );
    }

    public function save(AdminNewsSaveRequest $request){
        $id = $request->post('id');
        $model = $id ? News::find($id) : new News();
        $model->fill($request->all());
        $model->save();
        return redirect()->route("admin::news::update", ['news' => $model->id])
            ->with('success', "Данные сохранены");
    }

    public function update(Category $category, News $news, Status $status){
        return view("admin.news.create", [
                'model' => $news,
                'categories' => $category->getList(),
                'statuses' => $status->getList(),
            ]
        );
    }

    public function delete($id){
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }
}
