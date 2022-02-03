<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string|null $summary
 * @property string $content
 * @property int $category_id
 * @property int $source_id
 * @property int $status_id
 * @property string|null $publish_date
 * @property string|null $icon
 * @property string|null $image
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
      'title', 'summary', 'category_id', 'source_id', 'status_id', 'image', 'content', 'publish_date'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function source(){
        return $this->belongsTo(Source::class);
    }

//    protected $with = ['category'];

    public static function getByCategoryId(int $categoryId){
        return News::where('category_id', $categoryId)->get();
    }

    public static function getOneNews(int $categoryId, int $newsId){
        return News::getByCategoryId($categoryId)->find($newsId);
    }

    public static function getNews(){
        return News::all();
    }
    public static function getOne($id){
        return News::find($id);
    }

    public static function deleteNews($id){
        News::find($id)->delete();
    }


}
