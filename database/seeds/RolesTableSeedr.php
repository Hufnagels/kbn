<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;
use App\User;


class RolesTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      DB::table('roles')->truncate();

      $this->command->info('Create roles data');
      $date = Carbon::create(2017, 6, 20, 9);

      $admin = new Role();
      $admin->name = "admin"; //$user->hasRole('admin')
      $admin->display_name = "Admin";
      $admin->description = "Administrator with full rights ( CRUD Uo Do) on all table";
      $admin->created_at = $date;
      $admin->save();

      $editor = new Role();
      $editor->name = "editor"; //$user->hasRole('admin')
      $editor->display_name = "Editor";
      $editor->description = "Editor with full rights ( CRUD Uo Do) on news, category, etc w/o users table";
      $editor->created_at = $date;
      $editor->save();

      $author = new Role();
      $author->name = "author"; //$user->hasRole('admin')
      $author->display_name = "Author";
      $author->description = "Author with full rights ( CRUD ) on news, w/o category, users table";
      $author->created_at = $date;
      $author->save();

      // Attache roles to users
      // Admin
      $user1 = User::find(1);
      $user1->detachRole($admin);
      $user1->attachRole($admin);
      // Editor
      $user2 = User::find(2);
      $user2->detachRole($editor);
      $user2->attachRole($editor);
      // Author
      $user3 = User::find(3);
      $user3->detachRole($author);
      $user3->attachRole($author);

    }

}
