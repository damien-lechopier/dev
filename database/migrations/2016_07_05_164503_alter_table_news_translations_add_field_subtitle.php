<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableNewsTranslationsAddFieldSubtitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_translations', function (Blueprint $table) {
        	$table->string('subtitle',255)->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_translations', function (Blueprint $table) {
            $table->dropColumn('subtitle');
        });
    }
}

