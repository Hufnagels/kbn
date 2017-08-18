<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $this->command->info('Truncating Users table');
      $this->truncateTables();
        DB::table('permission_role')->truncate();
        $this->command->info('Create category data');
        $date = Carbon::create(2016, 6, 20, 9);
        DB::table('users')->insert([
          [
            'name'=>'Várkonyi István',
            'slug'=>'istvanvarkonyi',
            'email'=>'kbvconsulting@gmail.com',
            'bio'=>'',
            'password'=> bcrypt('password'),
            'created_at' => $date
          ],
          [
            'name'=>'Szakmáry Ákos',
            'slug'=>'akosszakmary',
            'email'=>'akos.szakmary@gmail.com',
            'bio'=>'',
            'password'=> bcrypt('password'),
            'created_at' => $date
          ],
          [
            'name'=>'Pálmai Zita',
            'slug'=>'zitapalmai',
            'email'=>'zsiraf21@gmail.com',
            'bio'=>'',
            'password'=> bcrypt('password'),
            'created_at' => $date
          ],


        ]);


        $users = App\User::all();
        $faker = Factory::create();
        $this->command->info('Users table. update bio');
        foreach ($users as $user) {
            //$slug = App\Post::where('id', $author->id)->first();
            DB::table('users')
            ->where('id', $user->id)
            ->update([

                'bio' => $faker->paragraphs(rand(3,5), true)

            ]);
            /*'slug' => str_slug($user->name),*/
        }

    }

    /**
     * Truncates all the laratrust tables and the users table
     * @return    void
     */
    public function truncateTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
