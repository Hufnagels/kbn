<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVideosAddUrlColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('url')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('published_at');
            $table->dropColumn('deleted_at');
        });
    }
}
