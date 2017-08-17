<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('slug')->unique();
            $table->string('subtitle', 250)->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->text('image')->nullable();
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('is_published')->default('0');
            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->integer('view_count')->unsigned()->default(0);
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
        Schema::dropIfExists('news');
    }
}
