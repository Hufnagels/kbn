<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $this->command->info('Create category data');
        $date = Carbon::create(2016, 6, 20, 9);
        DB::table('categories')->insert([
          [
            'title'=>'Uncategorized',
            'slug'=>'uncategorized',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Microbit beginner',
            'slug'=>'microbit-beginner',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Microbit intermediate',
            'slug'=>'microbit-intermediate',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Oktatás',
            'slug'=>'oktatas',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Interesting codes',
            'slug'=>'interesting-codes',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Konferencia',
            'slug'=>'konferencia',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Kiállítás',
            'slug'=>'kiallitas',
            'type'=>'news',
            'created_at' => $date
          ],
          [
            'title'=>'Tábor',
            'slug'=>'tabor',
            'type'=>'events',
            'created_at' => $date
          ],
          [
            'title'=>'Padagógus képzés',
            'slug'=>'pedagogus-kepzes',
            'type'=>'events',
            'created_at' => $date
          ]
        ]);

        //update news table
        for($news_id=1; $news_id<=20; $news_id++)
        {
          $category_id = rand(1,6);

          DB::table('news')
            ->where('id', $news_id)
            ->update(['category_id'=>$category_id]);
        }
    }
}
