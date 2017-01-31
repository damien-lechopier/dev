<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEadminRangesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_ranges_types',function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['draft', 'published']);
        });

        Schema::create('eadmin_ranges_types_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');
            $table->unique(['id', 'locale']);
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
        Schema::drop('eadmin_ranges_types_translations');
        Schema::drop('eadmin_ranges_types');
    }
}
