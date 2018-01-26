<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColumnNameTagStatusToStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publication_uploads', function (Blueprint $table) {
            //
            $table->renameColumn('tag_status', 'status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publication_uploads', function (Blueprint $table) {
            //
            $table->renameColumn('status', 'tag_status');
        });
    }
}
