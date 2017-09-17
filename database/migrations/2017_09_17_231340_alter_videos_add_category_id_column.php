<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVideosAddCategoryIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
          $table->integer('category_id')->unsigned()->default(1);
          // $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
