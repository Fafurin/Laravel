<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        \DB::table('news')
                ->insert([
                    'title' => $faker->text(30),
                    'summary' => $faker->text(100),
                    'content' => $faker->paragraph(50),
                    'category_id' => 9,
                    'source_id' => 3,
                    'status_id' => 1,
                    'publish_date' => $faker->date('Y-m-d h:i:s'),
                    'icon' => 'http://placeimg.com/150/100/any',
                    'image' => 'http://placeimg.com/640/480/any'
                ]);
    }
}
