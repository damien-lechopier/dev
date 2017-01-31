<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_slider_configs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('eadmin_slider_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('eadmin_slider_configs_categories', function(Blueprint $table) {
            $table->integer('config_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('config_id')->references('id')->on('eadmin_slider_configs');
            $table->foreign('category_id')->references('id')->on('eadmin_slider_categories');
        });

        Schema::create('eadmin_slider_config_options', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('option_key')->unique();
            $table->string('option_value');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('eadmin_slider_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eadmin_slider_config_options');
        Schema::dropIfExists('eadmin_slider_config');
        Schema::dropIfExists('eadmin_slider_configs_categories');
        Schema::dropIfExists('eadmin_slider_categories');
        Schema::dropIfExists('eadmin_slider_configs');
    }
}
