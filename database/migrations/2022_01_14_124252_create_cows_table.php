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
            $table->string('cow_name')->nullable();
            $table->date('cow_date_of_purchased')->nullable();
            $table->date('cow_date_of_production')->nullable();
            $table->date('cow_date_of_birth')->nullable();
            $table->boolean('cow_gender')->default(1);
            $table->float('cow_estimated_live_weight', 8, 2)->nullable();
            $table->float('cow_transaction_cost', 8, 2)->nullable();
            $table->float('cow_labour_cost', 8, 2)->nullable();
            $table->string('cow_status_type');

            $table->unsignedBigInteger('cow_color_id')->nullable()->default(Null);
            $table->foreign('cow_color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedBigInteger('cow_supplier_id')->nullable();
            $table->foreign('cow_supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            
            $table->unsignedBigInteger('cow_type_id')->nullable();
            $table->foreign('cow_type_id')->references('id')->on('cow_types')->onDelete('cascade');
            
            $table->unsignedBigInteger('cow_shade_id')->nullable();
            $table->foreign('cow_shade_id')->references('id')->on('shades')->onDelete('cascade');
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
