<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('news')->truncate();
        $this->command->info('Create dummy News data');
        //insert some data
        $posts=[];
        $faker = Factory::create();
        $date = Carbon::create(2016, 6, 20, 9);

        for($i=1; $i<=20; $i++)
        {
          //$date = date("Y-m-d H:i:s", strtotime("2017-07-20 10:10:10 + {$i} days"));
          $image = 'Post_Image_'.rand(1,5).'.png';
          $date->addDays($i);
          $publishedDate = clone($date);
          $createdDate = clone($date);

          $news[] = [
            'title' => $faker->sentence(rand(5,8)),
            'slug' => $faker->slug(),
            'subtitle' => $faker->sentence(rand(5,8)),
            'excerpt' => $faker->text(rand(200,250)),
            'body' => $faker->paragraphs(rand(10,15), true),
            'image' => rand(0,1) == 1 ? $image : NULL,
            'author_id' => rand(1,3), // users table specific users
            'category_id' => rand(1,7), // users table specific users
            'is_published' => 0,
            'created_at' => $createdDate,
            'updated_at' => $createdDate,
            'published_at' => $i < 10 ? $publishedDate : (rand(0,1) == 0 ? NULL : $publishedDate->addDays(4)),
            'view_count' => rand(1,10)*10 +$i
          ];
        }

        DB::table('news')->insert($news);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
