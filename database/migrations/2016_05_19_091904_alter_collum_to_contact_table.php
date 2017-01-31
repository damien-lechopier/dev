<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCollumToContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('contacts', function ($table) {
    		$table->dropColumn('id_pays');
    	});
    	Schema::table('contacts', function (Blueprint $table) {
    		$table->integer('id_zone')->after('id_provenance');
    		$table->integer('id_typologie')->after('fonction');
    		$table->string('id_pays')->after('id_sujet');
    	});

    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('contacts', function ($table) {
    		$table->dropColumn('id_zone');
    	});
    	Schema::table('contacts', function ($table) {
    		$table->dropColumn('id_typologie');
    	});
    	Schema::table('contacts', function ($table) {
    		$table->dropColumn('id_pays');
    	});
    	Schema::table('contacts', function (Blueprint $table) {
    		$table->integer('id_pays')->after('id_sujet');
    	});
    }
}
