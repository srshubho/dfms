<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

class CreateCowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cows', function (Blueprint $table) {
            $table->id();
            $table->string('cow_id')->unique();
            $table->string('name')->nullable();
            $table->string('primary_image')->nullable();
            $table->boolean('gender')->default(1);
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_production')->nullable();
            $table->float('estimated_live_weight', 8, 2)->nullable();
            $table->float('estimated_price', 8, 2)->nullable();
            $table->date('date_of_purchased')->nullable();
            $table->float('purchased_price', 8, 2)->nullable();
            $table->float('transition_cost', 8, 2)->nullable();
            $table->float('labour_cost', 8, 2)->nullable();
            $table->boolean('is_purchased');

            $table->unsignedBigInteger('breed_id')->nullable()->default(Null);
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');

            $table->string('status_type')->nullable();

            $table->unsignedBigInteger('color_id')->nullable()->default(Null);
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('cow_types')->onDelete('cascade');

            $table->unsignedBigInteger('shade_id')->nullable();
            $table->foreign('shade_id')->references('id')->on('shades')->onDelete('cascade');
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
        Schema::dropIfExists('cows');
    }
}
