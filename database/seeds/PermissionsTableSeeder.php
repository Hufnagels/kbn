<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Permission;
use App\Role;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      DB::table('permissions')->truncate();
      $this->command->info('Create roles data');
      $date = Carbon::create(2017, 6, 20, 9);

      // crud news
      $crudnews = new Permission();
      $crudnews->name = "crud-news"; //$user->hasRole('admin')
      $crudnews->display_name = "crud news";
      $crudnews->description = "( CRUD ) on news table";
      $crudnews->created_at = $date;
      $crudnews->save();

      // update others news
      $updateothersnews = new Permission();
      $updateothersnews->name = "update-others-news"; //$user->hasRole('admin')
      $updateothersnews->display_name = "update others news";
      $updateothersnews->description = "( Update others news too ) on news table";
      $updateothersnews->created_at = $date;
      $updateothersnews->save();

      // delete other news
      $deleteothersnews = new Permission();
      $deleteothersnews->name = "delete-others-news"; //$user->hasRole('admin')
      $deleteothersnews->display_name = "delete others news";
      $deleteothersnews->description = "( Delete others news too ) on news table";
      $deleteothersnews->created_at = $date;
      $deleteothersnews->save();

      // crud event
      $crudevent = new Permission();
      $crudevent->name = "crud-event"; //$user->hasRole('admin')
      $crudevent->display_name = "crud event";
      $crudevent->description = "( CRUD ) on events table";
      $crudevent->created_at = $date;
      $crudevent->save();

      // update others event
      $updateothersevent = new Permission();
      $updateothersevent->name = "update-others-event"; //$user->hasRole('admin')
      $updateothersevent->display_name = "update others event";
      $updateothersevent->description = "( Update others event too ) on event table";
      $updateothersevent->created_at = $date;
      $updateothersevent->save();

      // delete other event
      $deleteothersevent = new Permission();
      $deleteothersevent->name = "delete-others-event"; //$user->hasRole('admin')
      $deleteothersevent->display_name = "delete others event";
      $deleteothersevent->description = "( Delete others event too ) on event table";
      $deleteothersevent->created_at = $date;
      $deleteothersevent->save();

      // crud category
      $crudcategory = new Permission();
      $crudcategory->name = "crud-category"; //$user->hasRole('admin')
      $crudcategory->display_name = "crud category";
      $crudcategory->description = "( CRUD ) on categories table";
      $crudcategory->created_at = $date;
      $crudcategory->save();

      // crud user
      $cruduser = new Permission();
      $cruduser->name = "crud-user"; //$user->hasRole('admin')
      $cruduser->display_name = "crud user";
      $cruduser->description = "( CRUD ) on users table";
      $cruduser->created_at = $date;
      $cruduser->save();

      // edit profile
      $profile = new Permission();
      $profile->name = "edit-profile"; //$user->hasRole('admin')
      $profile->display_name = "edit profile";
      $profile->description = "Edit own profile";
      $profile->created_at = $date;
      $profile->save();

      // attach roles permissions
      $admin = Role::whereName('admin')->first();
      $editor = Role::whereName('editor')->first();
      $author = Role::whereName('author')->first();

      $admin->detachPermissions([$crudnews,$updateothersnews,$deleteothersnews,$crudevent,$updateothersevent,$deleteothersevent,$crudcategory,$cruduser,$profile]);
      $editor->detachPermissions([$crudnews,$updateothersnews,$deleteothersnews,$crudevent,$updateothersevent,$deleteothersevent,$crudcategory,$profile]);
      $author->detachPermissions([$crudnews,$crudevent,$profile]);


      $admin->attachPermissions([$crudnews,$updateothersnews,$deleteothersnews,$crudevent,$updateothersevent,$deleteothersevent,$crudcategory,$cruduser,$profile]);
      $editor->attachPermissions([$crudnews,$updateothersnews,$deleteothersnews,$crudevent,$updateothersevent,$deleteothersevent,$crudcategory,$profile]);
      $author->attachPermissions([$crudnews,$crudevent,$profile]);

    }
}
