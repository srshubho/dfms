<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shades', function (Blueprint $table) {
            $table->id();
            $table->string("shade_no")->unique();
            $table->integer("shade_area");
            $table->integer("shade_capacity");

            $table->unsignedBigInteger('shade_type')->nullable();
            $table->foreign('shade_type')->references('id')->on('cow_types')->onDelete('cascade');
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
        Schema::dropIfExists('shades');
    }
}
