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
        Schema::create('feed_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('assign_id')->nullable();
            $table->foreign('assign_id')->references('id')->on('assign_cow_to_staff')->onDelete('cascade');

            $table->unsignedBigInteger('cow_id')->nullable();
            $table->foreign('cow_id')->references('id')->on('cows')->onDelete('cascade');

            $table->unsignedBigInteger('bull_id')->nullable();
            $table->foreign('bull_id')->references('id')->on('bulls')->onDelete('cascade');

            $table->unsignedBigInteger('calf_id')->nullable();
            $table->foreign('calf_id')->references('id')->on('calves')->onDelete('cascade');

            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('feed_items')->onDelete('cascade');

            $table->unsignedBigInteger('feeded_by');
            $table->foreign('feeded_by')->references('id')->on('users')->onDelete('cascade');

            $table->tinyInteger("type");
            $table->string("quantity")->nullable();
            $table->date("date")->nullable();
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
        Schema::dropIfExists('feed_data');
    }
};
