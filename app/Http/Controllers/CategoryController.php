<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = (new Categories())->getCategories();
        return view('categories', ['categories' => $categories]);
    }
}
