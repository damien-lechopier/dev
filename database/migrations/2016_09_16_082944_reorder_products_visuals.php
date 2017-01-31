<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Files\File;

class ReorderProductsVisuals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $files = File::orderBy('fileable_type')->orderBy('fileable_id')->orderBy('filter')->get();
        $fileable_type = "";
        $fileable_id = "";
        $filter = "";
        $position = 1;
        foreach ($files as $file) {
            if($fileable_type == $file->fileable_type) {
                if(is_null($file->filter)) {
                    $file->filter = 'nofilter';
                    $file->save();
                }
                if($fileable_id == $file->fileable_id) {
                    if($filter == $file->filter) {
                        $file->position = $position;
                        $position ++;
                    } else {
                        $position = 1;
                        $filter = $file->filter;
                    }
                } else {
                    $position = 1;
                    $fileable_id = $file->fileable_id;
                    $file->position = $position;
                }
            } else {
                $position = 1;
                $fileable_type = $file->fileable_type;
                $file->position = $position;
            }
            $file->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
