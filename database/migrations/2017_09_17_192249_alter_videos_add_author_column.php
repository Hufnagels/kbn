<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVideosAddAuthorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('videos', function (Blueprint $table) {
          $table->integer('author_id')->unsigned();
          $table->foreign('author_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('author_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
