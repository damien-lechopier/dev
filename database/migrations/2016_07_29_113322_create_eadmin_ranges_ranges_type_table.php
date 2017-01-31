<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEadminRangesRangesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_ranges_ranges_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('range_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('range_id')->references('id')->on('eadmin_ranges')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('eadmin_ranges_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_ranges_ranges_types');
    }
}
