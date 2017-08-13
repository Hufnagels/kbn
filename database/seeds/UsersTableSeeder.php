<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $users = App\User::all();
        $faker = Factory::create();
        $this->command->info('Users table. update slug and bio');
        foreach ($users as $user) {
            //$slug = App\Post::where('id', $author->id)->first();
            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'slug' => str_slug($user->name),
                'bio' => $faker->paragraphs(rand(3,5), true)

            ]);
        }

    }
}
