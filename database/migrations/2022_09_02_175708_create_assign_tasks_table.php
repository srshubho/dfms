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
        Schema::create('assign_tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('assign_id')->nullable();
            $table->foreign('assign_id')->references('id')->on('assign_cow_to_staff')->onDelete('cascade');

            $table->unsignedBigInteger('cow_id')->nullable();
            $table->foreign('cow_id')->references('id')->on('cows')->onDelete('cascade');

            $table->unsignedBigInteger('bull_id')->nullable();
            $table->foreign('bull_id')->references('id')->on('bulls')->onDelete('cascade');

            $table->unsignedBigInteger('calf_id')->nullable();
            $table->foreign('calf_id')->references('id')->on('calves')->onDelete('cascade');

            $table->tinyInteger("type");
            $table->string('note')->nullable();
            $table->time('feeding_time')->nullable();
            $table->boolean('feeding_status')->nullable();
            $table->time('bath_time')->nullable();
            $table->boolean('bath_status')->nullable();
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
        Schema::dropIfExists('assign_tasks');
    }
};
