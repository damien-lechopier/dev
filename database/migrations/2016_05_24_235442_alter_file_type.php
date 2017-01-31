<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterFileType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadmin_files', function(Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('eadmin_files', function(Blueprint $table) {
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadmin_files', function(Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('eadmin_files', function(Blueprint $table) {
            $table->enum('type', ['image', 'document']);
        });
    }
}
