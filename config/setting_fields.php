<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    | In here you can define all the settings used in your app, it will be
    | available as a settings page where user can update it if needed
    | create sections of settings with a type of input.
    */
	'app' => [
		'title'			=> 'General',
		'desc'			=> 'All the general settings',
		'elements'	=> [
			[
				'data'	=> 'string', // data type: string, int, or boolean
				'name'	=> 'name', // unique name for field
				'value'	=> 'value' // default value if you want
			],
		],
	],
];
