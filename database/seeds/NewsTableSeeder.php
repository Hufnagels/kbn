<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset table
        DB::table('news')->truncate();

        //insert some data
        $posts=[];
        $faker = Factory::create();


        for($i=1; $i<=20; $i++)
        {
          $date = date("Y-m-d H:i:s", strtotime("2017-07-20 10:10:10 + {$i} days"));
          $image = 'Post_Image_'.rand(1,5).'.jpg';

          $posts[] = [
            'title' => $faker->sentence(rand(5,10)),
            'slug' => $faker->slug(),
            'subtitle' => $faker->sentence(rand(5,8)),
            'excerpt' => $faker->text(rand(200,350)),
            'body' => $faker->paragraphs(rand(10,15), true),
            'image' => rand(0,1) == 1 ? $image : NULL,
            'author_id' => rand(8,10),
            'is_published' => 0,
            'created_at' => $date,
          ];
        }

        DB::table('news')->insert($posts);
    }
}
