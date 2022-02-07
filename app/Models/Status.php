<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function news(){
        return $this->hasMany(News::class);
    }

//    public static function getStatuses(){
//        return Status::all();
//    }

    public function getList()
    {
        return Status::select(['id', 'title'])
            ->get()
            ->pluck('title', 'id');
    }
}
