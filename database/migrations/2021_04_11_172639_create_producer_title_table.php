<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducerTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_title', function (Blueprint $table) {
            $table->unsignedInteger('producer_id');
            $table->unsignedInteger('title_id');
            $table->unsignedTinyInteger('order')->default(1);

            $table->primary(['producer_id', 'title_id']);

            $table->foreign('producer_id')->on('producers')->references('id')
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
        Schema::dropIfExists('producer_title');
    }
}
