<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tv_channel_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
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
        Schema::dropIfExists('tv_uploads');
    }
}
