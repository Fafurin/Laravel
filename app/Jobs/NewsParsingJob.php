<?php

namespace App\Jobs;

use App\Models\Category;
use App\Services\NewsParser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NewsParser $parser)
    {
        $data = $parser->run($this->source);

        $channel_title = str_replace('Яндекс.Новости: ','', $data['channel_title']);
        foreach ($data['items'] as $item){
         \Storage::disk('parsingLogs')->append('log.txt', date('Y-m-d H:i:s'). ' ' . $item['title']);

            $categoryTitle = $channel_title;
            $categories = Category::get()->pluck('title');
            if (!($categories->contains($categoryTitle))){
                $category = new Category();
                $category->fill([
                    'title' => $categoryTitle
                ])->save();
            }
            $category = Category::where('title', $categoryTitle)->first();
            $category->news()->create([
                'title' => $item['title'],
                'source' => $item['link'],
                'summary' => $item['description'],
                'content' => $item['description'],
                'category_id' => $category->id,
                'status_id' => 1,
                'publish_date' => date("Y-m-d H:i:s", strtotime($item['pubDate'])),
                'image' => 'http://placeimg.com/640/480/any',
            ]);
        }
    }
}
