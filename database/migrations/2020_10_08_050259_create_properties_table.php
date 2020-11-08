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
            $table->integer('bath_number')->nullable();
            $table->integer('hall_number')->nullable();
            $table->integer('property_age');
            $table->integer('air_conditioner')->nullable();
            $table->integer('space')->nullable();
            $table->double('price')->nullable();
            $table->text('note')->nullable();
            $table->string('land_number')->nullable(); // رقم الارض
            $table->string('destination')->nullable(); //الوجهة
            $table->string('advertiser_status')->nullable(); // حالة المعلن
            $table->string('floor')->nullable(); // الطابق
            $table->string('the_number_stores')->nullable(); //عدد المحلات
            $table->string('the_number_apartments')->nullable(); //عدد الشقق
            $table->string('street_area')->nullable(); //عدد الشقق
            $table->string('the_purpose')->nullable(); //عدد الشقق
            $table->string('wells')->nullable(); //عدد الشقق
            $table->boolean('car_entrance')->nullable(); //عدد الشقق
            $table->boolean('deluxe')->nullable(); //ديلوكس
            $table->boolean('kitchen')->nullable(); // مطبخ
            $table->boolean('swimming_pool')->nullable(); // حوض سباحة
            $table->boolean('driver_room')->nullable(); //غرفة سائق;
            $table->boolean('maids_room')->nullable();//غرفة خادمة
            $table->boolean('elevator')->nullable(); //مصعد
            $table->boolean('furnished')->nullable(); //مؤثث
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
