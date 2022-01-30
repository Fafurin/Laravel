<?php

namespace App\Models;

class Categories
{
    public function getCategories(){
        return \DB::table('categories')->get();
    }
}
