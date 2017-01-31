<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEadminAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_accessories',function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('position');
            $table->enum('status', ['draft', 'published']);
        });

        Schema::create('eadmin_accessories_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('accessory_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');
            $table->unique(['id', 'locale']);
            $table->foreign('accessory_id')->references('id')->on('eadmin_accessories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_accessories_translations');
        Schema::drop('eadmin_accessories');
    }
}
