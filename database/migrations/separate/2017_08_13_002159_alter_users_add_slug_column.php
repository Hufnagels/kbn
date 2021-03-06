<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddSlugColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::disableForeignKeyConstraints();
         Schema::table('users', function (Blueprint $table) {
             $table->string('slug');
         });
         Schema::enableForeignKeyConstraints();
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::disableForeignKeyConstraints();
         Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('slug');
         });
     }
}
