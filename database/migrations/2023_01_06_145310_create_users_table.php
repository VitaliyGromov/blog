<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('active')->default(true);

            $table->string('password');
            $table->rememberToken();
        });
    } 

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
