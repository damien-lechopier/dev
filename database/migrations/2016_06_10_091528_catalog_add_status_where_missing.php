<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatalogAddStatusWhereMissing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadmin_ranges', function (Blueprint $table) {
            $table->enum('status', [config("constants.statuses.PUBLISHED"), config("constants.statuses.DRAFT")])
                ->default(config("constants.statuses.PUBLISHED"));
        });

        Schema::table('eadmin_families', function (Blueprint $table) {
            $table->enum('status', [config("constants.statuses.PUBLISHED"), config("constants.statuses.DRAFT")])
                ->default(config("constants.statuses.PUBLISHED"));
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadmin_ranges', function ($table) {
            $table->dropColumn('status');
        });
        Schema::table('eadmin_families', function ($table) {
            $table->dropColumn('status');
        });
    }
}
