<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCowImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cow_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cow_id')->nullable();
            $table->foreign('cow_id')->references('id')->on('cows')->onDelete('cascade');

            $table->string('image');
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
        Schema::dropIfExists('cow_images');
    }
}
