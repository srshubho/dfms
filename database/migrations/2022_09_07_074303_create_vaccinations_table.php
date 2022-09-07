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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('calf_id')->nullable();
            $table->foreign('calf_id')->references('id')->on('calves')->onDelete('cascade');

            $table->unsignedBigInteger('vaccine_id')->nullable();
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade');

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
        Schema::dropIfExists('vaccinations');
    }
};
