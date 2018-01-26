<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publication_upload_id');
            $table->string('headline');
            $table->text('description');
            $table->integer('highlight_id');
            $table->double('column_cm');
            $table->text('cordinate_map');
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
        Schema::dropIfExists('articles');
    }
}
