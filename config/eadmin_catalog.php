<?php
return [
    'visuals.filters' => [
        'list' => "",
        'slideshow' => "",
        'background' => "",
        'samples' => "",
        'nofilter' => 'Aucun filtre'
    ],
    'modules' => [
        'ranges' => [
            'enabled' => true,
            'label' => 'Fiches techniques générales',
            'fields' => [
                'type' => [
                    'enabled' => true,
                    'label' => 'Types'
                ],
                'name' => [
                    'enabled' => true,
                    'label' => 'Nom (nom court)',
                    'placeholder' => '15 caractères maximum.',
                    'size' => 15
                ],
                'title' => [
                    'enabled' => true,
                    'label' => 'Titre (nom long)',
                    'placeholder' => '30 caractères maximum.',
                    'size' => 30
                ],
                'presentation' => [
                    'enabled' => true,
                    'label' => 'Description'
                ]
            ],
            'caracteristics.part' => [
                'enabled' => false,
            ]
        ],
        'families' => [
            'enabled' => true,
            'label' => 'Catégories',
            'fields' => [
                'categories' => [
                    'enabled' => true,
                    'label' => 'Types de catégories'
                ],
                'name' => [
                    'enabled' => true,
                    'label' => 'Référence',
                    'placeholder' => '35 caractères maximum.',
                    'size' => 35
                ],
                'standard' => [
                    'enabled' => false,
                    'label' => 'Norme CE'
                ],
                'weight' => [
                    'enabled' => false,
                    'label' => 'Poids en Kg'
                ],
                'title' => [
                    'enabled' => true,
                    'label' => 'Nom',
                    'placeholder' => '35 caractères maximum.',
                    'size' => 35
                ],
                'description' => [
                    'enabled' => true,
                    'label' => 'Détails',
                    'placeholder' => '150 caractères maximum.',
                    'size' => 150
                ],
                'standard.description' => [
                    'enabled' => false,
                    'label' => 'Description CE'
                ],
                'advices' => [
                    'enabled' => false,
                    'label' => 'Conseil'
                ],
                'receptions' => [
                    'enabled' => false,
                    'label' => 'Réception de produits'
                ],
            ],
            'specifics.part' => [
                'enabled' => false,
            ]
        ],
        'products' => [
            'enabled' => true,
            'label' => 'Produits',
            'fields' => [
                'family' => [
                    'enabled' => false,
                    'label' => 'Catégorie'
                ],
                'families' => [
                    'enabled' => true,
                    'label' => 'Catégories'
                ],
                'name' => [
                    'enabled' => false,
                    'label' => 'Référence',
                    'placeholder' => '100 caractères maximum.',
                    'size' => 100
                ],
                'video' => [
                    'enabled' => true,
                    'label' => 'Vidéo YouTube',
                    'placeholder' => '100 caractères maximum.',
                    'size' => 100
                ],
                'reference' => [
                    'enabled' => true,
                    'label' => 'Nom',
                    'placeholder' => '100 caractères maximum.',
                    'size' => 100
                ],
                'designation' => [
                    'enabled' => true,
                    'label' => 'Détails',
                    'placeholder' => '150 caractères maximum.',
                    'size' => 150
                ],
                'description' => [
                    'enabled' => true,
                    'label' => 'Description'
                ],
                'dimensions' => [
                    'enabled' => false,
                    'label' => 'Dimensions'
                ],
                'palette' => [
                    'enabled' => false,
                    'label' => 'Palettes'
                ],
                'weight' => [
                    'enabled' => false,
                    'label' => 'Poids'
                ],
            ]
        ],
        'references' => [
            'enabled' => false,
            'label' => 'Références',
            'sites' => [
                'enabled' => false,
                'label' => 'Chantiers'
            ],
            'types' => [
                'enabled' => false,
                'label' => 'Types de chantiers'
            ],
            'usecases' => [
                'enabled' => false,
                'label' => 'Etudes de cas'
            ]
        ],
        'accessories' => [
            'enabled' => true,
            'label' => 'Modules et accessoires',
            'fields' => [
                'type' => [
                    'enabled' => true,
                    'label' => 'Type d\'objet',
                    'fields' => [
                        'module' => [
                            'enabled' => true,
                            'value' => 'module',
                            'label' => 'Module de fiche technique',
                        ],
                        'accessory' => [
                            'enabled' => true,
                            'value' => 'accessory',
                            'label' => 'Accessoire produit',
                        ],
                    ]
                ],
                'name' => [
                    'enabled' => true,
                    'label' => 'Nom',
                    'placeholder' => '100 caractères maximum.',
                    'size' => 100
                ],
                'description' => [
                    'enabled' => true,
                    'label' => 'Description'
                ],
            ]
        ],
    ],
    'files' => [
        'ranges' => [
            'visuals' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => true,
                'filemandatory' => true,
            ],
            'caracteristics' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => false,
                'filemandatory' => true,
            ],
            'visual.filters' => [
                'list' => "",
                'slideshow' => "",
                'background' => "",
                'samples' => "",
                'nofilter' => 'Aucun filtre'
            ]
        ],
        'families' => [
            'visuals' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => true,
                'filemandatory' => true,
            ],
            'application' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => false,
                'filemandatory' => false,
            ],
            'laying' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => false,
                'filemandatory' => false,
            ],
            'maintenance' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => false,
                'filemandatory' => false,
            ],
            'visual.filters' => [
                'list' => "",
                'slideshow' => "",
                'background' => "",
                'samples' => "",
                'nofilter' => 'Aucun filtre'
            ]
        ],
        'products' => [
            'visuals' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => true,
                'filemandatory' => true,
            ],
            'caracteristics' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => false,
                'filemandatory' => true,
            ],
            'visual.filters' => [
                'list' => "",
                'slideshow' => "",
                'background' => "",
                'samples' => "",
                'nofilter' => 'Aucun filtre'
            ]
        ],
        'documents' => [
            'documents' => [
                'seo' => true,
                'translations' => true,
                'placeholder' => true,
                'filemandatory' => true,
            ],
            'visual.filters' => [
                'public' => "Fiche technique d'installation",
                'level0' => "Notice d'installation (utilisateur authentifié)"
            ]
        ],
        'sites' => [
            'visuals' => [
                'seo' => false,
                'translations' => false,
                'placeholder' => false,
                'filemandatory' => true,
            ]
        ],
        'accessories' => [
            'visuals' => [
                'seo' => false,
                'translations' => true,
                'placeholder' => true,
                'filemandatory' => true,
            ],
            'visual.filters' => [
                'list' => "",
                'slideshow' => "",
                'background' => "",
                'samples' => "",
                'nofilter' => 'Aucun filtre'
            ]
        ],
        'size' => [
            'XL' => [
                'enabled' => false,
                'width' => 4000,
                'height' => 4000,
                'resize' => 'fit',
            ],
            'L' => [
                'enabled' => false,
                'width' => 2000,
                'height' => 2000,
                'resize' => 'fit',
            ],
            'M' => [
                'enabled' => true,
                'width' => 1000,
                'height' => 1000,
                'resize' => 'fit',
            ],
            'S' => [
                'enabled' => true,
                'width' => 550,
                'height' => 330,
                'resize' => 'fit',
            ],
            'XS' => [
                'enabled' => true,
                'width' => 80,
                'height' => 80,
                'resize' => 'fit',
            ]
        ],
    ]
];
