<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calves', function (Blueprint $table) {

            $table->id();
            $table->string('calf_id')->unique();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->date('date_of_birth');
            $table->float('estimated_live_weight',8,2)->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('gender')->default(1);
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('cows')->onDelete('cascade');
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
        Schema::dropIfExists('calves');
    }
}
