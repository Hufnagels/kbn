<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewsAddPublishedAtColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function(Blueprint $table){
          $table->timestamp('published_at')->nullable();
          //$table->integer('is_published')->default('0');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('news', function(Blueprint $table){
        $table->dropColumn('published_at');
        //$table->dropColumn('is_published');
      });
    }
}
