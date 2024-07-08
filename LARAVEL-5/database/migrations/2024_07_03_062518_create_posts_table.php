<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('excerpt');
            $table->datetime('published_at')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}



// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreatePostsTable extends Migration
// {
//     public function up()
//     {
//         Schema::create('posts', function (Blueprint $table) {
//             $table->id();
//             $table->string('title');
//             $table->text('content');
//             $table->text('excerpt');
//             $table->datetime('published_at')->nullable();
//             $table->unsignedBigInteger('user_id');
//             $table->unsignedBigInteger('category_id'); 
//             $table->string('image')->nullable();
//             $table->timestamps();

//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('posts');
//     }
// }
