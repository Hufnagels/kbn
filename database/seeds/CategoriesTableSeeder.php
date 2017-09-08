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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('categories')->truncate();
        $this->command->info('Create category data');
        $date = Carbon::create(2016, 6, 20, 9
        $updateDate = clone($date);
        DB::table('categories')->insert([
          [
            'title'=>'Uncategorized',
            'slug'=>'uncategorized',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Projekt',
            'slug'=>'projekt',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Microbit beginner',
            'slug'=>'microbit-beginner',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Microbit intermediate',
            'slug'=>'microbit-intermediate',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Oktatás',
            'slug'=>'oktatas',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Interesting codes',
            'slug'=>'interesting-codes',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Konferencia',
            'slug'=>'konferencia',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Kiállítás',
            'slug'=>'kiallitas',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Tábor',
            'slug'=>'tabor',
            'created_at' => $date,
            'updated_at' => $updateDate
          ],
          [
            'title'=>'Padagógus képzés',
            'slug'=>'pedagogus-kepzes',
            'created_at' => $date,
            'updated_at' => $updateDate
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
