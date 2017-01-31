<?php

use Illuminate\Database\Seeder;

class RangesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Type de gammes
        $locales = ['fr', 'en'];

        $galvathermName = ['Thermoplongeurs Galvatherm', 'Galvatherm immersion heaters'];
        $galvathermType = [
            'id' => 1,
            'status' => 'published',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];

        $gaineName = ['Thermoplongeurs à gaine', 'Tube immersion heaters'];
        $gaineType = [
            'id' => 2,
            'status' => 'published',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];

        $blindesName = ['Thermoplongeurs blindés', 'Sheated tubular immersion heaters'];
        $blindesType = [
            'id' => 3,
            'status' => 'published',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];


        DB::table('eadmin_ranges_types')->insert($galvathermType);
        DB::table('eadmin_ranges_types')->insert($gaineType);
        DB::table('eadmin_ranges_types')->insert($blindesType);

        //Traduction type de gammes
        foreach ($locales as $locale) {

            $galvathermTypeTrans = [
                'name' => $galvathermName,
                'description' => "",
                'locale' => $locale,
                'type_id' => $galvathermType['id'],
            ];

            $gaineTypeTrans = [
                'name' => $gaineName,
                'description' => "",
                'locale' => $locale,
                'type_id' => $gaineType['id'],
            ];

            $blindesTypeTrans = [
                'name' => $blindesName,
                'description' => "",
                'locale' => $locale,
                'type_id' => $blindesType['id'],
            ];


            DB::table('eadmin_ranges_types_translations')->insert($galvathermTypeTrans);
            DB::table('eadmin_ranges_types_translations')->insert($gaineTypeTrans);
            DB::table('eadmin_ranges_types_translations')->insert($blindesTypeTrans);
            //Fin traduction gammes
        }
    }
}
