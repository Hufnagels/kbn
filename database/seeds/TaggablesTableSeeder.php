<?php

use Illuminate\Database\Seeder;

class TaggablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      DB::table('taggables')->truncate();
      $this->command->info('Create Taggables Table data');
      DB::table('categories')->insert([
        [
          'taggable_id'=>'Uncategorized',
          'taggable_type'=>'uncategorized',
        ],
      ]};
    }
}
