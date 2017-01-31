<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BugfixRelationSiteTypesManyToMany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_sites_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('site_id')->unsigned();
            $table->integer('type_id')->unsigned();

            $table->foreign('site_id')->references('id')->on('eadmin_sites')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('eadmin_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_sites_types');
    }
}
