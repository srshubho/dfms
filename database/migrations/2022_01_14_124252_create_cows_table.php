<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('id')->unique();
            $table->string('name')->nullable();
            $table->date('date_of_purchased')->nullable();
            $table->date('date_of_production')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('inhouse');
            $table->boolean('is_purchased');
            $table->boolean('gender');
            $table->float('estimated_live_weight',8,2);
            $table->float('transaction_cost',8,2)->nullable();
            $table->float('labour_cost',8,2)->nullable();
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
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
