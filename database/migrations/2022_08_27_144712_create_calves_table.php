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
            $table->string('name');
            $table->string('primary_image')->nullable();
            $table->date('date_of_birth');
            $table->float('estimated_live_weight', 8, 2)->nullable();
            $table->boolean('gender')->default(1);
            $table->boolean('breed_percentage');

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedBigInteger('shade_id')->nullable();
            $table->foreign('shade_id')->references('id')->on('shades')->onDelete('cascade');

            $table->unsignedBigInteger('insemination_id')->nullable();
            $table->foreign('insemination_id')->references('id')->on('inseminations')->onDelete('cascade');

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
