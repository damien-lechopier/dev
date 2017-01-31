<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
        	$table->integer('id_civilite')->after('id');
        	$table->string('civility')->after('id_civilite');
            $table->string('nom')->after('name');
            $table->string('prenom')->after('nom');
            $table->string('fonction')->after('prenom');
            $table->string('telephone')->after('fonction');
            $table->string('fax')->after('telephone');
            $table->string('entreprise')->after('fax');
            $table->string('adresse')->after('entreprise');
            $table->string('cp')->after('adresse');
            $table->string('ville')->after('cp');
            $table->integer('id_pays')->after('ville');
            $table->string('pays')->after('id_pays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn(['id_civilite']);
            $table->dropColumn(['civilite']);
            $table->dropColumn(['nom']);
            $table->dropColumn(['prenom']);
            $table->dropColumn(['fonction']);
            $table->dropColumn(['telephone']);
            $table->dropColumn(['fax']);
            $table->dropColumn(['entreprise']);
            $table->dropColumn(['adresse']);
            $table->dropColumn(['cp']);
            $table->dropColumn(['ville']);
            $table->dropColumn(['id_pays']);
            $table->dropColumn(['pays']);
        });
    }
}
