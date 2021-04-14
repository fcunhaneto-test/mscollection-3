<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->unsignedInteger('id', 1);
            $table->string('title');
            $table->string('original_title')->nullable();
            $table->year('year');
            $table->time('time', 0)->nullable();
            $table->string('category_1', 25)->nullable();
            $table->string('category_2', 25)->nullable();
            $table->unsignedTinyInteger('our_rating')->default(0);
            $table->decimal('imdb_rating', 10, 1)->default(0);
            $table->string('poster')->nullable();
            $table->text('summary')->nullable();
            $table->boolean('is_movie')->default(true);

            $table->unique(['title', 'year']);
            $table->foreign('category_1')->on('categories')->references('name')
                ->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_2')->on('categories')->references('name')
                ->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titles');
    }
}
