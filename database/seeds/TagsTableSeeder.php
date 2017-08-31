<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\News;
use Carbon\Carbon;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('tags')->truncate();
        $this->command->info('Create dummy Tags data');

        $date = Carbon::create(2016, 6, 20, 9);

        $microbit = new Tag();
        $microbit->name = "Microbit";
        $microbit->slug = "microbit";
        $microbit->created_at = $date;
        $microbit->save();

        $intermediate = new Tag();
        $intermediate->name = "Intermediate";
        $intermediate->slug = "intermediate";
        $intermediate->created_at = $date;
        $intermediate->save();

        $beginner = new Tag();
        $beginner->name = "Beginner";
        $beginner->slug = "beginner";
        $beginner->created_at = $date;
        $beginner->save();

        $steam = new Tag();
        $steam->name = "STEAM";
        $steam->slug = "steam";
        $steam->created_at = $date;
        $steam->save();

        $minecraft = new Tag();
        $minecraft->name = "Minecraft";
        $minecraft->slug = "minecraft";
        $minecraft->created_at = $date;
        $minecraft->save();

        $this->command->info('Create dummy Tags relationship with newses');
        $tags = [
          $microbit->id,
          $intermediate->id,
          $beginner->id,
          $steam->id,
          $minecraft->id,
        ];
        foreach(News::all() as $post)
        {
          shuffle($tags);
          for ($i=1; $i < rand(1, count($tags)-1); $i++)
          {
            $post->tags()->detach($tags[$i]);
            $post->tags()->attach($tags[$i]);
          }
        }
    }
}
