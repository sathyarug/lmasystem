<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewcolumnsToPublications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('publications', function($table) {
        $table->integer('b_rate')->after('frequency');
        $table->integer('c_rate')->after('b_rate');
        $table->integer('bc1_rate')->after('c_rate');
        $table->integer('bc2_rate')->after('bc1_rate');
        $table->integer('c_width')->after('bc2_rate');
        $table->integer('readership')->after('c_width')->nullable();
        

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
        Schema::table('publications', function($table) {
        $table->dropColumn(['b_rate','c_rate','bc1_rate','bc2_rate','c_width','readership']);
      
        });
    }
}
