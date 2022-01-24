<?php

namespace App\Models;

class Categories
{
    private $categories =
        [
            1 => ['title' => 'category 1'],
            2 => ['title' => 'category 2'],
            3 => ['title' => 'category 3'],
            4 => ['title' => 'category 4'],
            5 => ['title' => 'category 5']
        ];

    public function getCategories(){
        $response = [];
        foreach ($this->categories as $id => $item){
            $response[] .= $item['title'];
        }
        return $response;
    }

}
