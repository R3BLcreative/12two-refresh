<?php
return [
	/**
	 * * Tables
	 *
	 * This array sets up the table/field structures for the base table/list
	 * views for collections, collection types, and categories.
	 *
	 */
	'tables' => [
		// COLLECTION TYPES
		'collection-types' => [
			'columns' => [
				'template' => 'grid-cols-[40px_75px_auto_150px_150px_150px]',
				'items' => [
					[
						'label' => 'ID',
						'slug' => 'id',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'label' => 'Icon',
						'slug' => 'icon',
						'type' => 'icon',
						'class' => 'text-center',
						'options' => [
							'icon' => 'fa-icons',
						],
					],
					[
						'label' => 'Name',
						'slug' => 'label',
						'type' => 'main',
						'class' => '',
						'options' => [
							'plural' => false,
							'nolink' => false,
						],
					],
					[
						'label' => 'Category',
						'slug' => 'category',
						'type' => 'category',
						'class' => 'text-center',
					],
					[
						'label' => 'Slug',
						'slug' => 'slug',
						'type' => 'slug',
						'class' => 'text-center',
					],
					[
						'label' => 'Actions',
						'slug' => '',
						'type' => 'actions',
						'class' => 'text-center',
						'options' => [
							'actions' => [
								'form_builder' => true,
								'delete' => true,
								'info' => true,
							],
						],
					],
				],
			],
			'fields' => [
				[
					'forms' => ['create', 'edit'],
					'order' => 1,
					'field' => 'input',
					'type' => 'number',
					'class' => 'col-span-full',
					'id' => 'order',
					'key' => 'order',
					'label' => 'Menu Order',
					'placeholder' => '1',
					'desc' => '',
					'required' => true,
					'options' => [],
					'validate' => [
						'store' => 'required|integer',
						'update' => 'required|integer',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 2,
					'field' => 'input',
					'type' => 'text',
					'class' => 'col-span-full',
					'id' => 'label',
					'key' => 'label',
					'label' => 'Singular Label',
					'placeholder' => 'Singular Label',
					'desc' => 'The singular form of the label you wish to use. (i.e. Item vs Items)',
					'required' => true,
					'options' => [],
					'validate' => [
						'store' => 'required',
						'update' => 'required',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 3,
					'field' => 'input',
					'type' => 'text',
					'class' => 'col-span-full',
					'id' => 'icon',
					'key' => 'icon',
					'label' => 'Icon',
					'placeholder' => 'fa-user-circle',
					'desc' => 'The Font Awesome icon identifier.',
					'required' => true,
					'options' => [],
					'validate' => [
						'store' => 'required',
						'update' => 'required',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 4,
					'field' => 'input',
					'type' => 'text',
					'class' => 'col-span-full',
					'id' => 'slug',
					'key' => 'slug',
					'label' => 'Slug',
					'placeholder' => 'slug',
					'desc' => 'Usually the plural form of the label, but it can be whatever you would like. Needs to be unique from any other collection type slug.',
					'required' => true,
					'options' => [],
					'validate' => [
						'store' => 'required|unique:App\Models\CollectionType,slug',
						'update' => 'required',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 5,
					'field' => 'text',
					'type' => 'default',
					'class' => 'col-span-full',
					'id' => 'desc',
					'key' => 'desc',
					'label' => 'Description',
					'placeholder' => 'Description',
					'desc' => '',
					'required' => false,
					'options' => [],
					'validate' => [
						'store' => '',
						'update' => '',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 6,
					'field' => 'select',
					'type' => 'categories',
					'class' => 'col-span-full',
					'id' => 'category_id',
					'key' => 'category_id',
					'label' => 'Category',
					'placeholder' => 'Please select one',
					'desc' => '',
					'required' => true,
					'options' => [
						'slug' => 'collection-type',
					],
					'validate' => [
						'store' => 'required',
						'update' => 'required',
					],
				],
			],
		],

		//CATEGORIES
		'categories' => [
			'columns' => [
				'template' => 'grid-cols-[40px_auto_150px_150px_150px]',
				'items' => [
					[
						'label' => 'ID',
						'slug' => 'id',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'label' => 'Name',
						'slug' => 'label',
						'type' => 'main',
						'class' => '',
						'options' => [
							'plural' => true,
							'nolink' => false,
						],
					],
					[
						'label' => 'Type',
						'slug' => 'type',
						'type' => 'default',
						'class' => 'text-center text-sm',
					],
					[
						'label' => 'Slug',
						'slug' => 'slug',
						'type' => 'slug',
						'class' => 'text-center',
					],
					[
						'label' => 'Actions',
						'slug' => '',
						'type' => 'actions',
						'class' => 'text-center',
						'options' => [
							'actions' => [
								'delete' => true,
								'info' => true,
							],
						],
					],
				],
			],
			'fields' => [],
		],

		// DEFAULT
		'default' => [
			'columns' => [
				'template' => 'grid-cols-[40px_auto_150px]',
				'items' => [
					[
						'label' => 'ID',
						'slug' => 'id',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'label' => 'Title',
						'slug' => 'title',
						'type' => 'main',
						'class' => '',
						'options' => [
							'plural' => false,
							'nolink' => false,
						],
					],
					[
						'label' => 'Actions',
						'slug' => '',
						'type' => 'actions',
						'class' => 'text-center',
						'options' => [
							'actions' => [
								'delete' => true,
								'info' => true,
							],
						],
					],
				],
			],
			'fields' => [],
		],
	],

	/**
	 * * Application Options
	 *
	 * This array sets up the options route view and form. Default values are
	 * entered here and loaded in to the app\Models\Option model as a collection.
	 * Once an initial database insertion is completed, option values will be loaded
	 * from the database instead of using this config file. Field display structures 
	 * will still be loaded through this config file though. Retrieval of a singular 
	 * option value is done via the option() helper function located in app\helpers.php.
	 *
	 * 'slug:unique:array - idenitifier for tabs & routes' => [
	 *		'icon:string' => 'Fontawesome Icon ID',
	 *		'title:string' => 'Option tab label and page title',
	 *		'desc:string' => 'Option page title subtext description',
	 *		'fields:array' => [
	 *			array:[
	 *				'type:string' => 'field type for loading dynamic field component, also casting',
	 *				'name:string' => 'form field id/name, and DB ID - UNIQUE',
	 *				'value' => 'default value for form field and option',
	 *				'label:string' => 'Form field label',
	 *				'placeholder:string' => 'Form field placeholder',
	 *				'desc:string' => 'Form field description text',
	 *				'requried:boolean' => 'Is the form field required for submission',
	 *				'rules:string|array' => 'Laravel validation rules',
	 *			]
	 *		]
	 *	]
	 *
	 */
	'options' => [
		'general' => [
			'icon'			=> 'fa-gears',
			'title'			=> 'General',
			'desc'			=> 'All general application settings and options.',
			'fields'		=> [],
		],
		'stripe' => [
			'icon'			=> 'fa-brands fa-stripe-s',
			'title'			=> 'Stripe',
			'desc'			=> 'All Stripe.com settings and options.',
			'fields'		=> [
				[
					'field'				=> 'section',
					'type'				=> '',
					'name'				=> '',
					'class'				=> 'col-span-full',
					'value'				=> '',
					'label'				=> 'Stripe Products',
					'placeholder' => '',
					'required'		=> false,
					'desc'				=> 'All options relating to Stripe Products',
					'options'			=> '',
				],
				[
					'field'				=> 'input',
					'type'				=> 'text',
					'name'				=> 'prod_fee',
					'class'				=> 'col-span-full',
					'value'				=> 'prod_NC3bOrluL2BaPF',
					'label'				=> 'Fee Product ID (test)',
					'placeholder' => 'prod_xxxxxxxxx',
					'desc'				=> 'The Stripe product ID for CC Fee in Test Mode',
					'required'		=> true,
					'rules'				=> 'required',
					'options'			=> '',
				],
				[
					'field'				=> 'input',
					'type'				=> 'text',
					'name'				=> 'prod_live_fee',
					'class'				=> 'col-span-full',
					'value'				=> 'prod_NC3c4qRBJo6Zf4',
					'label'				=> 'Fee Product ID (live)',
					'placeholder' => 'prod_xxxxxxxxx',
					'desc'				=> 'The Stripe product ID for CC Fee in Live Mode',
					'required'		=> true,
					'rules'				=> 'required',
					'options'			=> '',
				],
				[
					'field'				=> 'input',
					'type'				=> 'text',
					'name'				=> 'prod_donation',
					'class'				=> 'col-span-full',
					'value'				=> 'prod_NBkPvuz0JDBOkb',
					'label'				=> 'Donation Product ID (test)',
					'placeholder' => 'prod_xxxxxxxxx',
					'desc'				=> 'The Stripe product ID for Donations in Test Mode',
					'required'		=> true,
					'rules'				=> 'required',
					'options'			=> '',
				],
				[
					'field'				=> 'input',
					'type'				=> 'text',
					'name'				=> 'prod_live_donation',
					'class'				=> 'col-span-full',
					'value'				=> 'prod_NBkm0zFR4sB5SR',
					'label'				=> 'Donation Product ID (live)',
					'placeholder' => 'prod_xxxxxxxxx',
					'desc'				=> 'The Stripe product ID for Donations in Live Mode',
					'required'		=> true,
					'rules'				=> 'required',
					'options'			=> '',
				],
				[
					'field'				=> 'section',
					'type'				=> '',
					'name'				=> '',
					'class'				=> 'col-span-full',
					'value'				=> '',
					'label'				=> 'Stripe Prices',
					'placeholder' => '',
					'required'		=> false,
					'desc'				=> 'All options relating to Stripe Prices',
					'options'			=> '',
				],
				[
					'field'				=> 'input',
					'type'				=> 'text',
					'name'				=> 'price_bears',
					'class'				=> 'col-span-full',
					'value'				=> 'price_1MRMtMJ7flyAAmsm8gX89mOj',
					'label'				=> 'PrayerBear Price ID (test)',
					'placeholder' => 'price_xxxxxxxxx',
					'desc'				=> 'The Stripe price ID for PrayersBears in Test Mode',
					'required'		=> true,
					'rules'				=> 'required',
					'options'			=> '',
				],
				[
					'field'				=> 'input',
					'type'				=> 'text',
					'name'				=> 'price_live_bears',
					'class'				=> 'col-span-full',
					'value'				=> 'price_1MRNHVJ7flyAAmsmPxSxAr90',
					'label'				=> 'PrayerBear Price ID (live)',
					'placeholder' => 'price_xxxxxxxxx',
					'desc'				=> 'The Stripe price ID for PrayersBears in Live Mode',
					'required'		=> true,
					'rules'				=> 'required',
					'options'			=> '',
				],
			],
		],
	],
	/**
	 * * ADMIN FIELDS
	 * 
	 * All available field types
	 */
	'field_types' => [
		'Single Line Inputs' => [
			'string' => 'Basic String',
			'title' => 'Main Title',
			'integer' => 'Integer',
			'password' => 'Password',
		],
		'Selects & Dropdowns' => [
			'select' => 'Basic Select',
			'category' => 'Categories',
		],
		'Block Text & Editors' => [
			'text' => 'Basic Text',
			'fulltext' => 'Full Text Editor',
			'code' => 'Code Editor',
		],
		'Checkboxes & Radios' => [
			'checkbox' => 'Checkbox(es)',
		],
		'Date & Time' => [
			'timezones' => 'Timezone Select',
		],
		'Sections & Dividers' => [
			'section' => 'Section Title',
		],
	],
];

// TESTIMONIALS - COLUMNS
// 'template' => 'grid-cols-[24px_150px_150px_auto_150px]',
// 'items' => [
// 	[
// 		'text' => 'ID',
// 		'key' => 'id',
// 		'type' => 'id',
// 		'class' => 'text-center uppercase',
// 	],
// 	[
// 		'text' => 'Author',
// 		'key' => 'author',
// 		'type' => 'main',
// 		'class' => '!text-center',
// 	],
// 	[
// 		'text' => 'Trip',
// 		'key' => 'trip',
// 		'type' => 'default',
// 		'class' => 'text-center',
// 	],
// 	[
// 		'text' => 'Quote',
// 		'key' => 'quote',
// 		'type' => 'text',
// 		'class' => 'text-sm',
// 	],
// 	[
// 		'text' => 'Actions',
// 		'key' => '',
// 		'type' => 'actions',
// 		'class' => '',
// 	],
// ],

// TESTIMONIALS - FIELDS
// [
// 	'order' => 1,
// 	'type' => 'title',
// 	'class' => '',
// 	'id' => 'title',
// 	'key' => 'fields',
// 	'label' => 'Title',
// 	'placeholder' => 'Content Title',
// 	'desc' => '',
// 	'required' => true,
// 	'validate' => '',
// ],
// [
// 	'order' => 2,
// 	'type' => 'fulltext',
// 	'class' => '',
// 	'id' => 'quote',
// 	'key' => 'fields',
// 	'label' => 'Quote',
// 	'placeholder' => 'For many of us, inspiration is triggered by the quips and quotations of others.',
// 	'desc' => '',
// 	'required' => true,
// 	'validate' => '',
// ],
// [
// 	'order' => 3,
// 	'type' => 'string',
// 	'class' => '',
// 	'id' => 'author',
// 	'key' => 'fields',
// 	'label' => 'Author',
// 	'placeholder' => 'Emilee Day',
// 	'desc' => '',
// 	'required' => true,
// 	'validate' => '',
// ],
// [
// 	'order' => 4,
// 	'type' => 'string',
// 	'class' => '',
// 	'id' => 'trip',
// 	'key' => 'fields',
// 	'label' => 'Trip',
// 	'placeholder' => 'Location YYYY',
// 	'desc' => '',
// 	'required' => true,
// 	'validate' => '',
// ],