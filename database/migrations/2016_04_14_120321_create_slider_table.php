<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_sliders', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('config_id')->unsigned()->nullable();
            $table->tinyInteger('default')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('config_id')->references('id')->on('eadmin_slider_configs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eadmin_sliders');
    }
}
