<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Files\File;

class UpdateMorphRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $files = File::all();
        $newTypes = [
            'accessories' => 'idealcoms\eadmin\Models\Catalog\Accessories\Accessory',
            'families' => 'idealcoms\eadmin\Models\Catalog\Families\Family',
            'products' => 'idealcoms\eadmin\Models\Catalog\Products\BaseProducts',
            'ranges' => 'idealcoms\eadmin\Models\Catalog\Ranges\BaseRanges',
            'sites' => 'idealcoms\eadmin\Models\Catalog\Sites\Site',
        ];
        foreach ($files as $file) {
            if ($type = array_search($file->fileable_type, $newTypes)) {
                $file->fileable_type = $type;
                $file->save();
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
