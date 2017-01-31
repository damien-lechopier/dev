<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddStatusCollumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->enum('status', [config("constants.statuses.VALIDATED"), config("constants.statuses.REJECTED")])
    				->default(config("constants.statuses.VALIDATED"));
    	});
    	
    	DB::table('users')->update(array('status' => config("constants.statuses.VALIDATED")));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
		    $table->dropColumn('status');
		});
    	
    }
}
