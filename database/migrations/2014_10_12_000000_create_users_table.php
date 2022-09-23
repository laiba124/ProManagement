<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
             $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('role',['Customer','Developer','Manager','Admin']);//-> default('null');
            $table->enum('status',['Active','Inactive','Blocked','Admin']);//-> default('null');

            $table->timestamps();
            $table->rememberToken();
             
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
