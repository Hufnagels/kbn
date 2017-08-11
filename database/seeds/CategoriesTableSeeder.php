<?php

use Illuminate\Database\Seeder;

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

        DB::table('categories')->insert([
          [
            'title'=>'Microbit beginner',
            'slug'=>'microbit-beginner',
            'type'=>'news'
          ],
          [
            'title'=>'Microbit intermediate',
            'slug'=>'microbit-intermediate',
            'type'=>'news'
          ],
          [
            'title'=>'Oktatás',
            'slug'=>'oktatas',
            'type'=>'news'
          ],
          [
            'title'=>'Interesting codes',
            'slug'=>'interesting-codes',
            'type'=>'news'
          ],
          [
            'title'=>'Konferencia',
            'slug'=>'konferencia',
            'type'=>'news'
          ],
          [
            'title'=>'Kiállítás',
            'slug'=>'kiallitas',
            'type'=>'news'
          ],
          [
            'title'=>'Tábor',
            'slug'=>'tabor',
            'type'=>'events'
          ],
          [
            'title'=>'Padagógus képzés',
            'slug'=>'pedagogus-kepzes',
            'type'=>'events'
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
