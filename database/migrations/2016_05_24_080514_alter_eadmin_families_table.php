<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterEadminFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('eadmin_families', function(Blueprint $table) {
        	$table->enum('weight', ["/m²","/ml", "/unitaire"]);
        });
        
        Schema::table('eadmin_families_translations', function(Blueprint $table) {
        	$table->string('standard_description')->nullable();
        	$table->text('advices')->nullable();
        	$table->text('receptions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadmin_families', function(Blueprint $table) {
        	$table->dropColumn(['weight']);
        });
        
        Schema::table('eadmin_families_translations', function (Blueprint $table) {
        	$table->dropColumn(['standard_description', 'advices', 'receptions']);
        });
    }
}
