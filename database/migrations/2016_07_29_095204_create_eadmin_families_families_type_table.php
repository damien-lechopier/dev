<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEadminFamiliesFamiliesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_families_families_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('family_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('family_id')->references('id')->on('eadmin_families')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('eadmin_families_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_families_families_types');
    }
}
