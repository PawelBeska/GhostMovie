<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('author');
            $table->float('size')->default(0);
            $table->integer('server')->default(0);
            $table->integer('quality')->nullable();
            $table->integer('version')->nullable();
            $table->string('embed')->nullable();
            $table->text('source')->nullable();
            $table->text('remote_source')->nullable();
            $table->text('poster')->nullable(true);
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('movies_files');
    }
}
