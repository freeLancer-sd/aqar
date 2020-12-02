<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingAddPageUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->string('mobile_first')->nullable();
            $table->string('mobile_secondary')->nullable();
            $table->string('whats_app_first')->nullable();
            $table->string('whats_app_secondary')->nullable();
            $table->string('fb_page')->nullable();
            $table->string('tw_page')->nullable();
            $table->string('snp_page')->nullable();
            $table->string('ins_page')->nullable();
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
