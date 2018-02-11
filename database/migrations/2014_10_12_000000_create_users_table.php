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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedSmallInteger('year_of_birth')->nullable();
            $table->string('bio')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('avatar')->nullable();
            $table->string('status')->default('InActive');
            $table->text('preferences');
            $table->text('tutorial');
            $table->string('password');
            $table->integer('company_id')->unsigned()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
