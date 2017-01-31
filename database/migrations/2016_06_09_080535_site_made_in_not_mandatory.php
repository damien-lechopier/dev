<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteMadeInNotMandatory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadmin_sites', function (Blueprint $table) {
            $table->dropColumn('made_in');
        });
        Schema::table('eadmin_sites', function (Blueprint $table) {
            $table->unsignedInteger('made_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
