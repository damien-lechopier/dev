<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsesCasesForCatalog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_usecases',function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['draft', 'published']);
            $table->string('name');
        });

        Schema::create('eadmin_usecases_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('usecase_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');

            $table->unique(['id', 'locale']);
            $table->foreign('usecase_id')->references('id')->on('eadmin_usecases')->onDelete('cascade');
        });

        Schema::create('eadmin_usecases_sites', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('site_id')->unsigned();
            $table->integer('usecase_id')->unsigned();

            $table->foreign('site_id')->references('id')->on('eadmin_sites')->onDelete('cascade');
            $table->foreign('usecase_id')->references('id')->on('eadmin_usecases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_usecases_translations');
        Schema::drop('eadmin_usecases_sites');
        Schema::drop('eadmin_usecases');
    }
}
