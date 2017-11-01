<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publication_id');
            $table->integer('section_id');
            $table->integer('page_no');
            $table->date('published_date');
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
        Schema::dropIfExists('publication_uploads');
    }
}
