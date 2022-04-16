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
            $table->string('calf_name')->nullable();
            $table->unsignedBigInteger('calf_color_id')->nullable();
            $table->date('calf_date_of_birth');
            $table->float('calf_estimated_live_weight',8,2)->nullable();
            $table->unsignedBigInteger('calf_parent_id')->nullable();
            $table->boolean('calf_gender')->default(1);
            $table->foreign('calf_color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('calf_parent_id')->references('id')->on('cows')->onDelete('cascade');
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
