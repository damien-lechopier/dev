<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_slides', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('picture')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('position');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('slider_id')->unsigned()->nullable();
            $table->foreign('slider_id')->references('id')->on('eadmin_sliders')->onDelete('set null');
        });

        Schema::create('eadmin_slide_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('slide_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            $table->string('picture_alt')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('picture_title')->nullable();

            $table->unique(['slide_id', 'locale']);
            $table->foreign('slide_id')->references('id')->on('eadmin_slides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eadmin_slide_translations');
        Schema::dropIfExists('eadmin_slides');
    }
}
