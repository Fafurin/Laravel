<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategorySaveRequest;
use App\Http\Requests\AdminNewsSaveRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::getCategories();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(){
        return view("admin.categories.create", [
                'model' => new Category(),
                'is_succeed' => session('success'),
            ]
        );
    }

    public function save(AdminCategorySaveRequest $request){
        $id = $request->post('id');
        $model = $id ? Category::find($id) : new Category();
        $model->fill($request->all());
        $model->timestamps = false;
        $model->save();
        return redirect()->route("admin::categories::index")
            ->with('success', "Данные сохранены");
    }

    public function update(Category $category){
        return view("admin.categories.create", ['model' => $category]);
    }

    public function delete($id){
        Category::destroy([$id]);
        return redirect()->route("admin::categories::index");
    }
}
