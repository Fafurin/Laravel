<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories =
        [
            1 => ['title' => 'category 1'],
            2 => ['title' => 'category 2'],
            3 => ['title' => 'category 3'],
            4 => ['title' => 'category 4'],
            5 => ['title' => 'category 5']
        ];

    public function index(){
        $response = '';

        foreach ($this->categories as $id => $category){
            $response .= "<div><a href='/categories/{$id}'>{$category['title']}</a></div>";
        }

        return $response;
    }

    public function category($id){
        $category = $this->categories[$id];
        return $category['title'];
    }
}
