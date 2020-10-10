<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->integer('status')->default(1);
            $table->integer('room_number')->nullable();
            $table->integer('property_age');
            $table->integer('furnished')->nullable();
            $table->integer('air_conditioner')->nullable();
            $table->integer('space')->nullable();
            $table->double('price')->nullable();
            $table->text('note')->nullable();

            $table->foreignId('property_type_id')->constrained();
            $table->foreignId('property_categorie_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
