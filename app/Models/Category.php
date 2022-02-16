<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function news(){
        return $this->hasMany(News::class);
    }

    public static function getCategories(){
        return Category::all();
    }

    public function getList()
    {
        return Category::select(['id', 'title'])
            ->get()
            ->pluck('title', 'id');
    }

}
