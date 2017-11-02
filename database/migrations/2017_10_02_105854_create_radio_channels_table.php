<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadioChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_channels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->default(1);
            $table->string('name');
            $table->integer('language_id');
            $table->integer('status')->default(1);
            $table->integer('type')->default(0);
            $table->integer('user_created')->nullable();
            $table->integer('user_edited')->nullable();
            $table->ipAddress('ip_created')->nullable();
            $table->ipAddress('ip_edited')->nullable();
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
        Schema::dropIfExists('radio_channels');
    }
}
