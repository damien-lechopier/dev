<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code');
            $table->string('image', 255);
            $table->boolean('flag_home')->default(false);
            $table->boolean('flag_published')->default(false);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->bigInteger('position');
            $table->timestamps();

        });

        Schema::create('news_translations', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('locale')->index();

            $table->integer('news_id')->unsigned();
            $table->string('title', 255);
            $table->string('content', 255);
            $table->longText('learn_more_url')->nullable();
            $table->longText('pdf')->nullable();

            $table->unique(['news_id','locale']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news_translations');
        Schema::drop('news');
    }
}