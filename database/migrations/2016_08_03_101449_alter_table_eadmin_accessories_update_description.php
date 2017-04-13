<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEadminAccessoriesUpdateDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::statement('ALTER TABLE eadmin_accessories_translations MODIFY COLUMN description TEXT');
		
    	Schema::table('eadmin_accessories_translations', function (Blueprint $table) {
        	$table->text('description')->change();
        });
        
        Schema::table('eadmin_accessories', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('eadmin_accessories', function (Blueprint $table) {
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
        //DB::statement('ALTER TABLE eadmin_accessories_translations MODIFY COLUMN description VARCHAR(255)');

    	Schema::table('eadmin_accessories_translations', function (Blueprint $table) {
    		$table->string('description',255)->change();
    	});
    	
        Schema::table('eadmin_accessories', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('eadmin_accessories', function (Blueprint $table) {
            $table->enum('status', ['draft', 'published']);
        });
    }
}
