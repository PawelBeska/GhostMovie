<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table ->increments('id');
            $table ->string('login')->nullable(false) ->unique();
            $table ->string('email')->nullable(false) ->unique();
            $table ->string('password')->nullable(false);
            $table ->smallInteger('group') ->unsigned()->default(1);
            $table ->rememberToken();
            $table ->boolean('verified')->default(false);
            $table ->boolean('deleted') ->default(false);
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
