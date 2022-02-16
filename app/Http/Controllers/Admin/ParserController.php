<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(){
        $xml = XmlParser::load('https://3dnews.ru/news/rss');
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,link,category,pubDate]'],
        ]);

        foreach ($data['items'] as $item){
            $categoryTitle = $this->stringProcessing('Технологии и рынок IT. Новости - ','', $item['category'],50);
            $categories = Category::get()->pluck('title');
            if (!($categories->contains($categoryTitle))){
                $category = new Category();
                $category->fill([
                    'title' => $categoryTitle
                ])->save();
            }
            $category = Category::where('title', $categoryTitle)->first();
            $category->news()->create([
                'title' => mb_substr($item['title'],0,300),
                'summary' => $this->stringProcessing("&nbsp;"," ", $item['description'], 1000),
                'source' => $item['link'],
                'content' => $this->stringProcessing("&nbsp;"," ", $item['description'], 1000),
                'category_id' => $category->id,
                'status_id' => 1,
                'publish_date' => date("Y-m-d H:i:s", strtotime($item['pubDate'])),
                'image' => 'http://placeimg.com/640/480/any',
            ]);
        }
    }

    protected function stringProcessing(string $str_search, string $str_replace, string $str_target, int $str_length){
        return mb_substr(str_replace($str_search, $str_replace, htmlentities(trim($str_target))), 0, $str_length);
    }
}

