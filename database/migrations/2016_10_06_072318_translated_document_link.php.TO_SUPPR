<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use idealcoms\eadmin\Models\Catalog\Files\File;

class TranslatedDocumentLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $locales = config('translatable.locales');
        $documents = File::where('type', 'documents')->get();
        foreach ($documents as $document) {
            foreach ($locales as $locale) {
                if (isset($document->translate($locale)->title)) {
                    if ($document->translate($locale)->title != "Missing title" && $document->translate($locale)->title != "Titre manquant") {
                        $document->translate($locale)->tag_title = $document->translate($locale)->title;
                        $document->translate($locale)->tag_alt = str_slug(strtolower($document->translate($locale)->title));
                        $document->translate($locale)->tag_src = str_slug(strtolower($document->translate($locale)->title)) . "." . pathinfo($document->filename, PATHINFO_EXTENSION);
                        $document->save();
                    }
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
