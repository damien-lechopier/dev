<?php
return [

    'news' => [
    	'enabled'	=> env('NEWS_ENABLED', true),
        'nb_max_on_top' => env('NEWS_NB_MAX_ON_TOP', 2),
    	'nb_per_page' => env('NEWS_NB_PER_PAGE', 4),
    ],
	'catalog' => [
		'enabled'	=> env('CATALOG_ENABLED', true),
	],
	'slider' => [
		'enabled'	=> env('SLIDER_ENABLED', false),
	],
	'contact' => [
		'enabled'	=> env('CONTACT_ENABLED', false),
	]
];