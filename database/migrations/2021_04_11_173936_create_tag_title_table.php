<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_title', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('title_id');

            $table->primary(['tag_id', 'title_id']);

            $table->foreign('tag_id')->on('tags')->references('id')
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
        Schema::dropIfExists('tag_title');
    }
}
