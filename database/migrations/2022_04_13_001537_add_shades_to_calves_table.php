<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShadesToCalvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calves', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('calf_shade_id')->nullable()->after('calf_gender');
            $table->foreign('calf_shade_id')->references('id')->on('shades')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calves', function (Blueprint $table) {
            //
        });
    }
}
