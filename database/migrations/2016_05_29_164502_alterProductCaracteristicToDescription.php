<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductCaracteristicToDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadmin_products_translations', function (Blueprint $table) {
            $table->renameColumn('caracteristics', 'description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadmin_products_translations', function (Blueprint $table) {
            $table->renameColumn('description', 'caracteristics');
        });
    }
}
