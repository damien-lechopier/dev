<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEadminRangeAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_range_accessories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('range_id')->unsigned();
            $table->integer('accessory_id')->unsigned();
            $table->foreign('accessory_id')->references('id')->on('eadmin_accessories')->onDelete('cascade');
            $table->foreign('range_id')->references('id')->on('eadmin_ranges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_range_accessories');
    }
}
