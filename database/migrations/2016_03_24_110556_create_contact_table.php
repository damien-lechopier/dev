<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('contacts', function(Blueprint $table)
    	{
    		$table->increments('id');
    		$table->integer('id_sujet');
    		$table->integer('id_pays');
    		$table->integer('id_departement');
    		$table->string('sujet');
    		$table->integer('id_provenance');
    		$table->string('nom');
    		$table->string('prenom');
    		$table->string('email');
    		$table->string('telephone');
    		$table->string('fax');
    		$table->string('entreprise');
    		$table->string('fonction');
    		$table->string('adresse');
    		$table->string('cp');
    		$table->string('ville');
    		$table->text('message');
    		$table->timestamps();
    		
    		$table->integer('user_id')->unsigned()->nullable();
    		
    		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('contacts');
    }
}
