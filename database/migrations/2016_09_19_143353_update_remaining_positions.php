<?php

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Accessories\Accessory;
use idealcoms\eadmin\Models\Catalog\Ranges\BaseRanges;
use idealcoms\eadmin\Models\Catalog\Families\Family;

class UpdateRemainingPositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $accessories = Accessory::all();
        $position = 1;
        foreach ($accessories as $accessory) {
            $accessory->position = $position;
            $accessory->save();
            $position++;
        }
        $position = 1;
        $baseRanges = BaseRanges::all();
        foreach ($baseRanges as $range) {
            $range->position = $position;
            $range->save();
            $position++;
        }
        $position = 1;
        $families = Family::all();
        foreach ($families as $family) {
            $family->position = $position;
            $family->save();
            $position++;
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
