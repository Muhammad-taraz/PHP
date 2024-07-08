<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('products', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name');
    //         $table->float('price');
    //         $table->integer('quantity');
    //         $table->string('brand');
    //         $table->text('description')->nullable();
    //         $table->string('image')->nullable();
    //         $table->timestamps();
    //     });

    //     Schema::table('products', function (Blueprint $table) {
    //         $table->unsignedBigInteger('category_id')->nullable()->after('brand');
    //         $table->unsignedBigInteger('subcategory_id')->nullable()->after('category_id');

    //         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    //         $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::table('products', function (Blueprint $table) {
    //         $table->dropForeign(['category_id']);
    //         $table->dropForeign(['subcategory_id']);
    //         $table->dropColumn('category_id');
    //         $table->dropColumn('subcategory_id');
    //     });

    //     Schema::dropIfExists('products');
    // }
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->integer('quantity');
            $table->string('brand');
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }

};
