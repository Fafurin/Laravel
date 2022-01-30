<?php

namespace App\Models;

class News
{
    public function getAllNews(){
        return \DB::table('news')->get();
    }

    public function getOne(int $cat_id, int $id){
        $return = [];
        $news = $this->getByCategoryId($cat_id);
        foreach ($news as $item){
            if($item->id == $id)
                $return = $item;
        }
        return $return;
    }

    public function getByCategoryId(int $categoryId)
    {
        $return = [];
        $news = $this->getAllNews();
        foreach ($news as $item) {
            if($item->category_id == $categoryId) {
                $return[] = $item;
            }
        }
        return $return;
    }

}

