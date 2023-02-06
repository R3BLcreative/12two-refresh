<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Application Options
    |--------------------------------------------------------------------------
    |
    | In here you can define all the options used in your app, it will be
    | available as a options page where user can update it if needed
    | create tabs of options with a type of input.
    */
	'general' => [
		'title'			=> 'General',
		'desc'			=> 'All the general options',
		'fields'		=> [
			[
				'data_type'		=> 'string', // data type: string, int, or boolean
				'name'				=> 'name', // unique name for field
				'value'				=> 'value', // default value if you want
				'label'				=> 'Name', // Field label
				'placeholder' => '', // Field placeholder text
				'desc'				=> '', // Field description text
			],
		],
	],
	'stripe' => [
		'title'			=> 'Stripe',
		'desc'			=> 'All the Stripe.com options',
		'fields'		=> [
			[
				'data_type'		=> 'string',
				'name'				=> 'prod_fee',
				'value'				=> 'prod_NC3bOrluL2BaPF',
				'label'				=> 'Fee Product ID (test)',
				'placeholder' => 'prod_xxxxxxxxx',
				'desc'				=> 'The Stripe product ID for CC Fee in Test Mode',
			],
			[
				'data_type'		=> 'string',
				'name'				=> 'prod_live_fee',
				'value'				=> 'prod_NC3c4qRBJo6Zf4',
				'label'				=> 'Fee Product ID (live)',
				'placeholder' => 'prod_xxxxxxxxx',
				'desc'				=> 'The Stripe product ID for CC Fee in Live Mode',
			],
			[
				'data_type'		=> 'string',
				'name'				=> 'prod_donation',
				'value'				=> 'prod_NBkPvuz0JDBOkb',
				'label'				=> 'Donation Product ID (test)',
				'placeholder' => 'prod_xxxxxxxxx',
				'desc'				=> 'The Stripe product ID for Donations in Test Mode',
			],
			[
				'data_type'		=> 'string',
				'name'				=> 'prod_live_donation',
				'value'				=> 'prod_NBkm0zFR4sB5SR',
				'label'				=> 'Donation Product ID (live)',
				'placeholder' => 'prod_xxxxxxxxx',
				'desc'				=> 'The Stripe product ID for Donations in Live Mode',
			],
			[
				'data_type'		=> 'string',
				'name'				=> 'price_bears',
				'value'				=> 'price_1MRMtMJ7flyAAmsm8gX89mOj',
				'label'				=> 'PrayerBear Price ID (test)',
				'placeholder' => 'price_xxxxxxxxx',
				'desc'				=> 'The Stripe price ID for PrayersBears in Test Mode',
			],
			[
				'data_type'		=> 'string',
				'name'				=> 'price_live_bears',
				'value'				=> 'price_1MRNHVJ7flyAAmsmPxSxAr90',
				'label'				=> 'PrayerBear Price ID (live)',
				'placeholder' => 'price_xxxxxxxxx',
				'desc'				=> 'The Stripe price ID for PrayersBears in Live Mode',
			],
		],
	],
	'mailchimp' => [
		'title'			=> 'MailChimp',
		'desc'			=> 'All the MailChimp.com options',
		'fields'		=> [
			[
				'data_type'		=> 'string',
				'name'				=> 'example',
				'value'				=> 'Example',
				'label'				=> 'Example',
				'placeholder' => 'Example',
				'desc'				=> 'Example',
			],
		],
	],
];
