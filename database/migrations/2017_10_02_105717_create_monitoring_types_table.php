<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
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
        Schema::dropIfExists('monitoring_types');
    }
}
