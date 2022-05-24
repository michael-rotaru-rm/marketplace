<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id');
            // $table->foreignId('category_id');
            $table->string('slug')->uniqid(); 
            $table->string('title'); 
            $table->string('description');
            $table->integer('price');
            $table->string('image_url');
            $table->timestamps();
            $table->timestamp("published_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
