<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Files\File;

class UpdateDocumentType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $files = File::where('type', 'documents')->get();
        $documentConfigs = config('eadmin_catalog.files.documents.visual.filters');
        foreach ($files as $file) {
            if (!is_null($file->filename)) {
                if (in_array(pathinfo($file->filename, PATHINFO_EXTENSION), ['png', 'gif', 'jpg', 'jpeg'])) {
                    if ($file->filter == 'nofilter' || is_null($file->filter) || $documentConfigs['public']) {
                        $file->filter = 'public';
                    } else if ($file->filter == 2 || $file->filter == 1) {
                        $file->filter = 'level0';
                    }
                    $file->save();
                }
            }
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
