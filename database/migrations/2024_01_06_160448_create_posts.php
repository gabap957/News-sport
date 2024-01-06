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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('title');
            $table->text('content');
            $table->text('url')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('image_id');
            $table->unsignedBigInteger('type_id');//1:thuong; 2:tin dac biet;
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('user_id');
            $table->bigInteger('view')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
