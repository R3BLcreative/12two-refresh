<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class CollectionTypeMetaSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('collection_type_metas')->insert([
			// USERS
			[
				'collection_type_id' => 1,
				'columns'			=> json_encode([
					[
						'text' => 'ID',
						'key' => '',
						'type' => 'id',
						'class' => 'text-center uppercase',
					],
					[
						'text' => 'Name',
						'key' => 'name',
						'type' => 'main',
						'class' => '',
					],
					[
						'text' => 'Role',
						'key' => '',
						'type' => 'user_role',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields' 			=> json_encode([
					[
						'type' => 'admin-fields.title',
						'class' => '',
						'id' => 'name',
						'key' => 'name',
						'label' => 'Name',
						'placeholder' => 'John Doe',
						'desc' => '',
						'required' => true,
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'email',
						'key' => 'email',
						'label' => 'Email / Username',
						'placeholder' => 'john@example.com',
						'desc' => '',
						'required' => true,
						'validate' => 'required|unique:App\Models\User,email',
					],
					[
						'type' => 'admin-fields.password',
						'class' => '',
						'id' => 'current_pass',
						'key' => '',
						'label' => 'Current Password',
						'placeholder' => 'Current Password',
						'desc' => '',
						'required' => false,
						'validate' => 'required_with_all:new_pass,confirm_pass|current_password:web',
					],
					[
						'type' => 'admin-fields.password',
						'class' => '',
						'id' => 'new_pass',
						'key' => 'password',
						'label' => 'New Password',
						'placeholder' => 'New Password',
						'desc' => '',
						'required' => false,
						'validate' => 'required_with_all:current_pass,confirm_pass',
					],
					[
						'type' => 'admin-fields.password',
						'class' => '',
						'id' => 'confirm_pass',
						'key' => '',
						'label' => 'Confirm New Password',
						'placeholder' => 'Confirm New Password',
						'desc' => '',
						'required' => false,
						'validate' => 'required_with_all:current_pass,new_pass|same:new_pass',
					],
				]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// MENUS
			[
				'collection_type_id' => 2,
				'columns'			=> NULL,
				'fields' 			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// CONTENT TYPES
			[
				'collection_type_id' => 3,
				'columns'			=> json_encode([
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
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([
					[
						'type' => 'admin-fields.integer',
						'class' => '',
						'id' => 'order',
						'key' => 'order',
						'label' => 'Menu Order',
						'placeholder' => '1',
						'desc' => '',
						'required' => true,
						'validate' => 'required|integer',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'label',
						'key' => 'label',
						'label' => 'Singular Label',
						'placeholder' => 'Singular Label',
						'desc' => 'The singular form of the label you wish to use. (i.e. Item vs Items)',
						'required' => true,
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'icon',
						'key' => 'icon',
						'label' => 'Icon',
						'placeholder' => 'fa-user-circle',
						'desc' => 'The Font Awesome icon identifier.',
						'required' => true,
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'slug',
						'key' => 'slug',
						'label' => 'Slug',
						'placeholder' => 'slug',
						'desc' => 'Usually the plural form of the label, but it can be whatever you would like. Needs to be unique from any other collection type slug.',
						'required' => true,
						'validate' => 'required|unique:App\Models\CollectionType,slug',
					],
					[
						'type' => 'admin-fields.text',
						'class' => '',
						'id' => 'desc',
						'key' => 'desc',
						'label' => 'Description',
						'placeholder' => 'Description',
						'desc' => '',
						'required' => false,
						'validate' => '',
					],
					[
						'type' => 'admin-fields.category',
						'class' => '',
						'id' => 'category_id',
						'key' => 'category_id',
						'label' => 'Category',
						'placeholder' => 'Please select one',
						'desc' => '',
						'required' => true,
						'catType' => 'collection-type',
						'validate' => 'required',
					],
				]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// CATEGORIES
			[
				'collection_type_id' => 4,
				'columns'			=> json_encode([
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
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields' 			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// OPTIONS
			[
				'collection_type_id' => 5,
				'columns'			=> NULL,
				'fields' 			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// PAGES
			[
				'collection_type_id' => 6,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// POSTS
			[
				'collection_type_id' => 7,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// SECTIONS
			[
				'collection_type_id' => 8,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// FAQS
			[
				'collection_type_id' => 9,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// TESTIMONIALS
			[
				'collection_type_id' => 10,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([
					[
						'type' => 'admin-fields.title',
						'class' => '',
						'id' => 'title',
						'key' => 'fields',
						'label' => 'Title',
						'placeholder' => 'Content Title',
						'desc' => '',
						'required' => true,
						'validate' => '',
					],
					[
						'type' => 'admin-fields.tiny',
						'class' => '',
						'id' => 'quote',
						'key' => 'fields',
						'label' => 'Quote',
						'placeholder' => 'For many of us, inspiration is triggered by the quips and quotations of others.',
						'desc' => '',
						'required' => true,
						'validate' => '',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'author',
						'key' => 'fields',
						'label' => 'Author',
						'placeholder' => 'Emilee Day',
						'desc' => '',
						'required' => true,
						'validate' => '',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'trip',
						'key' => 'fields',
						'label' => 'Trip',
						'placeholder' => 'Location YYYY',
						'desc' => '',
						'required' => true,
						'validate' => '',
					],
				]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// TRIPS
			[
				'collection_type_id' => 11,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// GROUPS
			[
				'collection_type_id' => 12,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// PARTICIPANTS
			[
				'collection_type_id' => 13,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// PAYMENTS
			[
				'collection_type_id' => 14,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// DONATIONS
			[
				'collection_type_id' => 15,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// SUBSCRIBERS
			[
				'collection_type_id' => 16,
				'columns'			=> json_encode([
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
					],
					[
						'text' => 'Updated',
						'key' => 'updated_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
					[
						'text' => 'Created',
						'key' => 'created_at',
						'type' => 'timestamp',
						'class' => 'text-center',
					],
				]),
				'fields'			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
		]);
	}
}
