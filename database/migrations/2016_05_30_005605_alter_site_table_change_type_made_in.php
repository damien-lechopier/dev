<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class AlterSiteTableChangeTypeMadeIn extends Migration
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
            $table->unsignedInteger('made_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadmin_sites', function (Blueprint $table) {
            $table->dropColumn('made_in');
        });

        Schema::table('eadmin_sites', function (Blueprint $table) {
            $table->dateTime('made_in')->default(Carbon::now());
        });
    }
}
