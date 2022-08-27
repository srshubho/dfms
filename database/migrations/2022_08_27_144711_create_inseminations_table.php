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
        Schema::create('inseminations', function (Blueprint $table) {
            $table->id();
            $table->string('insemination_id')->unique();

            $table->unsignedBigInteger('cow_id')->nullable();
            $table->foreign('cow_id')->references('id')->on('cows')->onDelete('cascade');

            $table->unsignedBigInteger('bull_id')->nullable();
            $table->foreign('bull_id')->references('id')->on('bulls')->onDelete('cascade');

            $table->date('insemination_date');
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
        Schema::dropIfExists('inseminations');
    }
};
