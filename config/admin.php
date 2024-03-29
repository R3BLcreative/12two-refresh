<?php

return json_decode(json_encode([
	'tables' => [
		// COLLECTION TYPES
		'collection-types' => [
			'columns' => [
				'template' => 'grid-cols-[40px_75px_auto_150px_150px_150px]',
				'items' => [
					[
						'text' => 'ID',
						'key' => 'id',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'icon' => 'fa-icons',
						'key' => 'icon',
						'type' => 'icon',
						'class' => 'text-center',
					],
					[
						'text' => 'Name',
						'key' => 'label',
						'type' => 'main',
						'class' => '',
						'plural' => false,
						'nolink' => false,
					],
					[
						'text' => 'Category',
						'key' => 'category',
						'type' => 'category',
						'class' => 'text-center',
					],
					[
						'text' => 'Slug',
						'key' => 'slug',
						'type' => 'slug',
						'class' => 'text-center',
					],
					[
						'text' => 'Actions',
						'key' => '',
						'type' => 'actions',
						'class' => 'text-center',
						'actions' => [
							'delete' => true,
							'info' => true,
						],
					],
				],
			],
			'fields' => [
				[
					'forms' => ['create', 'edit'],
					'order' => 1,
					'type' => 'integer',
					'class' => '',
					'id' => 'order',
					'key' => 'order',
					'label' => 'Menu Order',
					'placeholder' => '1',
					'desc' => '',
					'required' => true,
					'validate' => [
						'store' => 'required|integer',
						'update' => 'required|integer',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 2,
					'type' => 'string',
					'class' => '',
					'id' => 'label',
					'key' => 'label',
					'label' => 'Singular Label',
					'placeholder' => 'Singular Label',
					'desc' => 'The singular form of the label you wish to use. (i.e. Item vs Items)',
					'required' => true,
					'validate' => [
						'store' => 'required',
						'update' => 'required',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 3,
					'type' => 'string',
					'class' => '',
					'id' => 'icon',
					'key' => 'icon',
					'label' => 'Icon',
					'placeholder' => 'fa-user-circle',
					'desc' => 'The Font Awesome icon identifier.',
					'required' => true,
					'validate' => [
						'store' => 'required',
						'update' => 'required',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 4,
					'type' => 'string',
					'class' => '',
					'id' => 'slug',
					'key' => 'slug',
					'label' => 'Slug',
					'placeholder' => 'slug',
					'desc' => 'Usually the plural form of the label, but it can be whatever you would like. Needs to be unique from any other collection type slug.',
					'required' => true,
					'validate' => [
						'store' => 'required|unique:App\Models\CollectionType,slug',
						'update' => 'required',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 5,
					'type' => 'text',
					'class' => '',
					'id' => 'desc',
					'key' => 'desc',
					'label' => 'Description',
					'placeholder' => 'Description',
					'desc' => '',
					'required' => false,
					'validate' => [
						'store' => '',
						'update' => '',
					],
				],
				[
					'forms' => ['create', 'edit'],
					'order' => 6,
					'type' => 'category',
					'class' => '',
					'id' => 'category_id',
					'key' => 'category_id',
					'label' => 'Category',
					'placeholder' => 'Please select one',
					'desc' => '',
					'required' => true,
					'catType' => 'collection-type',
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
						'text' => 'ID',
						'key' => 'id',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'text' => 'Name',
						'key' => 'label',
						'type' => 'main',
						'class' => '',
						'plural' => true,
						'nolink' => false,
					],
					[
						'text' => 'Type',
						'key' => 'type',
						'type' => 'default',
						'class' => 'text-center text-sm',
					],
					[
						'text' => 'Slug',
						'key' => 'slug',
						'type' => 'slug',
						'class' => 'text-center',
					],
					[
						'text' => 'Actions',
						'key' => '',
						'type' => 'actions',
						'class' => 'text-center',
						'actions' => [
							'delete' => true,
							'info' => true,
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
						'text' => 'ID',
						'key' => 'id',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'text' => 'Title',
						'key' => 'title',
						'type' => 'main',
						'class' => '',
						'plural' => false,
						'nolink' => false,
					],
					[
						'text' => 'Actions',
						'key' => '',
						'type' => 'actions',
						'class' => 'text-center',
						'actions' => [
							'delete' => true,
							'info' => true,
						],
					],
				],
			],
			'fields' => [],
		],
	],
]));

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