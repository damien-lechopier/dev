<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterEadminFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadmin_files_translations', function (Blueprint $table) {
        	$table->dropColumn('description');
        });
        
        Schema::table('eadmin_files_translations', function(Blueprint $table) {
        	$table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('eadmin_files_translations', function (Blueprint $table) {
        	$table->dropColumn('description');
    	});
    	
    	Schema::table('eadmin_files_translations', function(Blueprint $table) {
    		$table->string('description');
    	});
    }
}
