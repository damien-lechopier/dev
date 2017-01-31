<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddStatusToSites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadmin_sites', function(Blueprint $table) {
            $table->enum('status', ['draft', 'published']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadmin_sites', function(Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
}
