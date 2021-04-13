<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_title', function (Blueprint $table) {
            $table->unsignedTinyInteger('media_id');
            $table->unsignedInteger('title_id');

            $table->primary(['media_id', 'title_id']);

            $table->foreign('media_id')->on('media')->references('id')
                ->onDelete('cascade');
            $table->foreign('title_id')->on('titles')->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_title');
    }
}
