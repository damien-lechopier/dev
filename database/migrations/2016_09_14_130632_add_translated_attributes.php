<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Families\FamilyTypes;
use idealcoms\eadmin\Models\Catalog\Ranges\BaseRangesTypes;
use idealcoms\eadmin\Models\Catalog\Products\BaseProducts;

class AddTranslatedAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $locales = ['fr', 'en'];

        //Type de famille
        $installationName = [
            'fr' => 'Type d’installation',
            'en' => 'Type of installation'
        ];

        $materielName = [
            'fr' => 'Type de matériel',
            'en' => 'Type of product'
        ];
        ;

        $niveauName = [
            'fr' => 'Niveau, température et régulation',
            'en' => 'Level, temperature and control'
        ];
        $installation = FamilyTypes::find(1);
        $materiel = FamilyTypes::find(2);
        $niveau = FamilyTypes::find(3);

        //Traduction type de famille
        foreach ($locales as $locale) {
            $installation->translate($locale)->name = $installationName[$locale];
            $materiel->translate($locale)->name = $materielName[$locale];
            $niveau->translate($locale)->name = $niveauName[$locale];
        }
        $installation->save();
        $materiel->save();
        $niveau->save();
        //Fin traduction familles produits

        // Type de gammes
        $galvathermName = [
            'fr' => 'Thermoplongeurs Galvatherm',
            'en' => 'Galvatherm immersion heaters'
        ];
        $gaineName = [
            'fr' => 'Thermoplongeurs à gaine',
            'en' => 'Tube immersion heaters'
        ];
        $blindesName = [
            'fr' => 'Thermoplongeurs blindés',
            'en' => 'Sheated tubular immersion heaters'
        ];
        $galvatherm = BaseRangesTypes::find(1);
        $gaine = BaseRangesTypes::find(2);
        $blindes = BaseRangesTypes::find(3);

        foreach ($locales as $locale) {
            $galvatherm->translate($locale)->name = $galvathermName[$locale];
            $gaine->translate($locale)->name = $gaineName[$locale];
            $blindes->translate($locale)->name = $blindesName[$locale];
        }
        $galvatherm->save();
        $gaine->save();
        $blindes->save();
        // Fin type de gammes

        // Traduction des produits
        $productsUpdates = [
            1 => "Immersion heaters Galvaflon",
            17 => "IBC Heating jacket - Inteliheat IBC Range<br \/>",
            29 => "Heating cartridge Calor<br \/>",
            31 => "Rod immersion heaters Galmaform<br \/>",
            32 => "Screwed rod heaters Etto<br \/>",
            46 => "Annular immersion heater - Assembly type T09 &amp; T16",
            68 => "Standard heating jacket<br \/>",
            82 => "test",
            83 => "test nom 2",
            85 => "aa",
            86 => "test",
            33 => "ATEX process induction heater Thermosafe<br \/>",
            34 => "Induction base heater - Faratherm Range<br \/><br \/>",
            67 => "Standard Heating jacket - ref 720501\/2\/3 for containers",
            81 => "Insulated heating jacket<br \/>",
            35 => "Heating jacket - Inteliheat Range<br \/>",
            36 => "Immersion heaters Rotkappe range<br \/>",
            37 => "Angular immersion heaters Rotkappe range<br \/><br \/>",
            76 => "Immersion heaters Small Rotkappe range",
            38 => "Flat immersion heater - Assembly type A",
            39 => "Flat immersion heater - Assembly type B",
            40 => "Flat immersion heater - Assembly type C",
            41 => "Flat immersion heater - Assembly type D",
            42 => "Flat immersion heater - Assembly type F",
            43 => "Cylindrical immersion heater <br \/>Assembly type S",
            64 => "Flat immersion heater - Assembly type D with feet",
            44 => "Cylindrical immersion heater <br \/>Assembly type R",
            45 => "Cylindrical immersion heater - Assembly type P",
            47 => "Control-Therm <br \/>Assembly type T",
            48 => "Control-Therm <br \/>Assembly type U",
            79 => "Level probes - Stainless steel float switches MTS",
            50 => "Controlling and monitoring fluid levels - ENR200-300, ETS100-200 and ETS410<br \/>",
            51 => "Temperature controller - MTR",
            52 => "Monitoring temperatures - Electronic Temperature Limiter ETB100 with temperature sensor TF24<br \/>",
            53 => "Level probes - Conductive level rod-probes NS\/NT",
            63 => "Flat immersion heater - Assembly type C with feet",
            54 => "Level probes - Float switches MTSu\/MTSt",
            55 => "Temperature - SOPT and SOTC probes",
            56 => "Temperature - TF probes",
            57 => "B-STRU rod-type thermostat",
            58 => "B-STB rod-type temperature limiter",
            62 => "Flat immersion heater - Assembly type A with feet",
            65 => "Flat immersion heater - Assembly type F with feet",
            66 => "Cylindrical immersion heater - Assembly type S with feet",
            77 => "Control box, single-phase - Galvabox 2M07-3",
            78 => "Control box, three-phases - <br \/>Galvabox 5T15-3",
            69 => "Standard heating jacket - 630 Range<br \/>",
            70 => "Digiheat base heater",
            71 => "Silicon heating belt<br \/>",
            72 => "Rotkappe safety immersion heaters&nbsp; with anti-burn-system (ABS)",
            73 => "Immersion heaters Rotkappe Rotkopf range",
            74 => "Flat immersion heater - Assembly type A with feet, to keep liquid storage tanks from freezing<br \/>",
            75 => "Flat immersion heater - Assembly type F with feet, to keep liquid \r\nstorage tanks from freezing",
            80 => "Base heater, mechanical thermostat<br \/>",
            84 => "Plate heat exchanger",
            87 => "KNS continuous level measurement system<br \/>"
        ];
        foreach ($productsUpdates as $id => $referenceEn) {
            $product = BaseProducts::find($id);
            if(!is_null($product)) {
                $product->translate('fr')->reference = $product->name;
                $product->translate('en')->reference = $referenceEn;
                $product->save();
            }
        }

        // Fin traduction des produits
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
