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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('shop_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('gender')->nullable();
            $table->string('image');
            $table->string('address');
            $table->string('phone_number');
            $table->string('id_card');
            $table->integer('role_id')->index();
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
