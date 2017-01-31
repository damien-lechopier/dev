<?php

use Illuminate\Database\Seeder;

class FamiliesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Type de famille
        $locales = ['fr', 'en'];

        $installationName = ['Type d’installation', 'Type of installation'];
        $installationType = [
            'id' => 1,
            'status' => 'published',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];

        $materielName = ['Type de matériel', 'Type of product'];
        $materielType = [
            'id' => 2,
            'status' => 'published',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];

        $niveauName = ['Niveau, température et régulation', 'Level, temperature and control'];
        $niveauType = [
            'id' => 3,
            'status' => 'published',
            'created_at' => new Datetime(),
            'updated_at' => new Datetime(),
        ];


        DB::table('eadmin_families_types')->insert($installationType);
        DB::table('eadmin_families_types')->insert($materielType);
        DB::table('eadmin_families_types')->insert($niveauType);

        //Traduction type de famille
        foreach ($locales as $locale) {

            $installationTypeTrans = [
                'name' => $installationName,
                'description' => "",
                'locale' => $locale,
                'type_id' => $installationType['id'],
            ];

            $materielTypeTrans = [
                'name' => $materielName,
                'description' => "",
                'locale' => $locale,
                'type_id' => $materielType['id'],
            ];

            $niveauTypeTrans = [
                'name' => $niveauName,
                'description' => "",
                'locale' => $locale,
                'type_id' => $niveauType['id'],
            ];


            DB::table('eadmin_families_types_translations')->insert($installationTypeTrans);
            DB::table('eadmin_families_types_translations')->insert($materielTypeTrans);
            DB::table('eadmin_families_types_translations')->insert($niveauTypeTrans);
            //Fin traduction familles produits
        }
    }
}
