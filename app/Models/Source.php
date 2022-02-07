<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    public function news(){
        return $this->hasMany(News::class);
    }

//    public static function getSources(){
//        return Source::all();
//    }

    public function getList()
    {
        return Source::select(['id', 'title'])
            ->get()
            ->pluck('title', 'id');
    }

}
