<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Files\File;

class FixDocumentFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $files = File::where('type', 'documents')->get();
        foreach ($files as $file) {
            if (in_array($file->filter, ['nofilter', '0']) || is_null($file->filter)) {
                $file->filter = 'public';
            } else if (in_array($file->filter, ['level1', '2'])) {
                $file->filter = 'level0';
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
