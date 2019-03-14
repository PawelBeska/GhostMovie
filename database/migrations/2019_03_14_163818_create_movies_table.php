<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100)->nullable(false);
            $table->string('original_title',100)->nullable(true);
            $table->string('poster',100)->nullable(true);
            $table->year('year')->nullable(false);
            $table->date('premiere_world')->nullable(true);
            $table->date('premiere_country')->nullable(true);
            $table->string('video_url',100)->nullable(true);
            $table->float('rating')->nullable(true);
            $table->smallInteger('duration')->nullable(true);
            $table->string('country',30)->nullable(true);
            $table->string('description',255)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
