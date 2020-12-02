<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityDistrictProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $t) {
//            $t->unsignedBigInteger('city_id')->nullable();
            $t->foreignId('city_id')->constrained();
            $t->foreignId('district_id')->constrained();
//            $t->unsignedBigInteger('district_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
