<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSitesProductsRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_sites_products', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('site_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('site_id')->references('id')->on('eadmin_sites')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('eadmin_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_sites_products');
    }
}
