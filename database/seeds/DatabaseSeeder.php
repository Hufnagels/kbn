<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // $this->call(LaratrustSeeder::class);
        // $this->call(UsersTableSeeder::class);
        //$this->call(CategoriesTableSeeder::class);
        // $this->call(NewsTableSeeder::class);
        // $this->call(RolesTableSeedr::class);
        // $this->call(PermissionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        //$this->call(TaggablesTableSeeder::class);

    }
}
