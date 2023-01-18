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
	'stripe' => [
		'title'			=> 'Stripe',
		'desc'			=> 'All the Stripe.com settings',
		'elements'	=> [
			[
				'data'	=> 'string',
				'name'	=> 'prod_test_fee',
				'value'	=> 'prod_NC3bOrluL2BaPF'
			],
			[
				'data'	=> 'string',
				'name'	=> 'prod_live_fee',
				'value'	=> 'prod_NC3c4qRBJo6Zf4'
			],
			[
				'data'	=> 'string',
				'name'	=> 'prod_test_donation',
				'value'	=> 'prod_NBkPvuz0JDBOkb'
			],
			[
				'data'	=> 'string',
				'name'	=> 'prod_live_donation',
				'value'	=> 'prod_NBkm0zFR4sB5SR'
			],
			[
				'data'	=> 'string',
				'name'	=> 'price_test_bears',
				'value'	=> 'price_1MRMtMJ7flyAAmsm8gX89mOj'
			],
			[
				'data'	=> 'string',
				'name'	=> 'price_live_bears',
				'value'	=> 'price_1MRNHVJ7flyAAmsmPxSxAr90'
			],
		],
	],
];
