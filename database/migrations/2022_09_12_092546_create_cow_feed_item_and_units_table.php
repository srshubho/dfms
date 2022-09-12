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
        Schema::create('cow_feed_item_and_units', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cow_id')->nullable();
            $table->foreign('cow_id')->references('id')->on('cows')->onDelete('cascade');

            $table->unsignedBigInteger('bull_id')->nullable();
            $table->foreign('bull_id')->references('id')->on('bulls')->onDelete('cascade');

            $table->unsignedBigInteger('calf_id')->nullable();
            $table->foreign('calf_id')->references('id')->on('calves')->onDelete('cascade');

            $table->unsignedBigInteger('feed_item_id');
            $table->foreign('feed_item_id')->references('id')->on('feed_items')->onDelete('cascade');

            $table->string("unit");
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
        Schema::dropIfExists('cow_feed_item_and_units');
    }
};
