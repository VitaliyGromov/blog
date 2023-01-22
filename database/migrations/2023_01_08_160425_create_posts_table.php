<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->text('body');
            
            $table->boolean('published')->default(true);
            $table->timestamp('published_at')->nullable();

            $table->foreignId('category_id')->nullable()->constrained('categories');      
            $table->foreignId('user_id')->constrained('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
