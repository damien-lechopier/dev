<?php

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEadminCatalogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadmin_ranges', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('position');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('eadmin_ranges_translations', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('locale')->index();
            $table->integer('range_id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->longText('description')->nullable();

            $table->unique(['range_id','locale']);
            $table->foreign('range_id')->references('id')->on('eadmin_ranges')->onDelete('cascade');
        });

        Schema::create('eadmin_products', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->enum('status', ['draft', 'published']);
        });

        Schema::create('eadmin_products_translations', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('locale')->index();
            $table->integer('product_id')->unsigned();
            $table->string('designation')->nullable();
            $table->text('caracteristics')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('palette')->nullable();
            $table->string('weight')->nullable();

            $table->unique(['product_id','locale']);
            $table->foreign('product_id')->references('id')->on('eadmin_products')->onDelete('cascade');
        });

        Schema::create('eadmin_sites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('selected_pages');
            $table->string('country');
            $table->string('region')->nullable();
            $table->string('department')->nullable();
            $table->string('city')->nullable();
            $table->string('reference')->nullable();
            $table->dateTime('made_in')->default(Carbon::now());
            $table->tinyInteger('urban')->default(1);
            $table->integer('range_id')->unsigned()->nullable();
        });

        Schema::create('eadmin_sites_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('locale')->index();
            $table->integer('site_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->unique(['id', 'locale']);
            $table->foreign('site_id')->references('id')->on('eadmin_sites')->onDelete('cascade');
        });

        Schema::create('eadmin_families', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('position');
            $table->tinyInteger('standard');
        });

        Schema::create('eadmin_families_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('locale')->index();
            $table->integer('family_id')->unsigned();
            $table->string('title');
            $table->string('description');

            $table->unique(['id', 'locale']);
            $table->foreign('family_id')->references('id')->on('eadmin_families')->onDelete('cascade');
        });

        Schema::create('eadmin_types',function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['draft', 'published']);
            $table->string('name');
        });

        Schema::create('eadmin_types_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');

            $table->unique(['id', 'locale']);
            $table->foreign('type_id')->references('id')->on('eadmin_types')->onDelete('cascade');
        });

        Schema::create('eadmin_files', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('fileable_id')->unsigned();
            $table->string('fileable_type');
            $table->timestamps();
            $table->enum('type', ['image', 'document']);
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('filter')->nullable();
            $table->string('aspect')->nullable();
            $table->enum('status', ['draft', 'published']);
            $table->integer('position');
            $table->tinyInteger('is_default')->default(0);
            $table->tinyInteger('is_global')->default(0);
            $table->tinyInteger('is_header')->default(0);
        });

        Schema::create('eadmin_files_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('description')->nullable();
            $table->string('tag_alt')->nullable();
            $table->string('tag_title')->nullable();
            $table->string('tag_src')->nullable();
            $table->string('link_text')->nullable();
            $table->string('category')->nullable();
            $table->string('filename')->nullable();

            $table->unique(['id', 'locale']);
            $table->foreign('file_id')->references('id')->on('eadmin_files')->onDelete('cascade');
        });

        Schema::create('eadmin_products_ranges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('range_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('eadmin_products')->onDelete('cascade');
            $table->foreign('range_id')->references('id')->on('eadmin_ranges')->onDelete('cascade');
        });

        Schema::create('eadmin_sites_families', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('site_id')->unsigned();
            $table->integer('family_id')->unsigned();

            $table->foreign('site_id')->references('id')->on('eadmin_sites')->onDelete('cascade');
            $table->foreign('family_id')->references('id')->on('eadmin_families')->onDelete('cascade');
        });
        
       	Schema::table('eadmin_products', function (Blueprint $table) {
       		$table->integer('family_id')->nullable()->unsigned();
       		$table->integer('type_id')->nullable()->unsigned();
       		
       		$table->foreign('family_id')->references('id')->on('eadmin_families')->onDelete('set null');
       		$table->foreign('type_id')->references('id')->on('eadmin_types')->onDelete('set null');
       	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eadmin_ranges_translations');
        Schema::drop('eadmin_ranges');
        Schema::drop('eadmin_products');
        Schema::drop('eadmin_products_translations');
        Schema::drop('eadmin_sites');
        Schema::drop('eadmin_sites_translations');
        Schema::drop('eadmin_families');
        Schema::drop('eadmin_families_translations');
        Schema::drop('eadmin_types');
        Schema::drop('eadmin_types_translations');
        Schema::drop('eadmin_files');
        Schema::drop('eadmin_files_translations');
    }
}
