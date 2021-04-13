<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cast_title', function (Blueprint $table) {
            $table->unsignedInteger('cast_id');
            $table->unsignedInteger('title_id');
            $table->unsignedTinyInteger('order')->default(1);
            $table->boolean('star')->default(false);

            $table->primary(['cast_id', 'title_id']);

            $table->foreign('cast_id')->on('cast')->references('id')
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
        Schema::dropIfExists('cast_title');
    }
}
