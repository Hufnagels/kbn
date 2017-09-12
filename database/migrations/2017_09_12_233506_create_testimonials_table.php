<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
          $table->increments('id');
          $table->string('testi_text', 300);
          $table->string('slug')->unique();
          $table->string('testi_name');
          $table->string('testi_title');
          $table->integer('author_id')->unsigned();
          $table->foreign('author_id')->references('id')->on('users')->onDelete('restrict');
          $table->timestamp('published_at')->nullable();
          $table->timestamps();
          $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            Schema::dropIfExists('testimonials');
        });
    }
}
