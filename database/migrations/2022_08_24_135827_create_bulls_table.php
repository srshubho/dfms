<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulls', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('breed_id')->nullable();
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');

            $table->float('breed_percentage')->nullable();
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
        Schema::dropIfExists('bulls');
    }
}
