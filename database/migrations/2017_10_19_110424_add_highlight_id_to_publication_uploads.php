<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHighlightIdToPublicationUploads extends Migration
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
            $table->integer('section_id')->nullable()->change();
            $table->integer('tag_status')->after('published_date')->default(0);

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
             $table->dropColumn('tag_status');
             $table->integer('section_id')->nullable(false)->change();
        });
    }
}
