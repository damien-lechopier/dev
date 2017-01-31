<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveCollumnFilenameToEadminFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('eadmin_files_translations', function ($table) {
    		$table->dropColumn('filename');
    	});
    	Schema::table('eadmin_files', function (Blueprint $table) {
    		$table->string('filename')->nullable()->after('id');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('eadmin_files', function ($table) {
    		$table->dropColumn('filename');
    	});
    	Schema::table('eadmin_files_translations', function ($table) {
    		$table->string('filename')->nullable()->after('category');
    	});
    }
}
