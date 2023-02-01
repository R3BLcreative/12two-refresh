<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class ContentTypeMetaSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('content_type_metas')->insert([
			// USERS
			[
				'content_type_id' => 1,
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
						'label' => 'Name',
						'placeholder' => 'John Doe',
						'desc' => '',
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'email',
						'label' => 'Email / Username',
						'placeholder' => 'john@example.com',
						'desc' => '',
						'validate' => 'required|unique:App\Models\User,email',
					],
					[
						'type' => 'admin-fields.password',
						'class' => '',
						'id' => 'current_pass',
						'label' => 'Current Password',
						'placeholder' => 'Current Password',
						'desc' => '',
						'validate' => 'required_with_all:new_pass,confirm_pass|current_password:web',
					],
					[
						'type' => 'admin-fields.password',
						'class' => '',
						'id' => 'new_pass',
						'label' => 'New Password',
						'placeholder' => 'New Password',
						'desc' => '',
						'validate' => 'required_with_all:current_pass,confirm_pass',
					],
					[
						'type' => 'admin-fields.password',
						'class' => '',
						'id' => 'confirm_pass',
						'label' => 'Confirm New Password',
						'placeholder' => 'Confirm New Password',
						'desc' => '',
						'validate' => 'required_with_all:current_pass,new_pass|same:new_pass',
					],
				]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// MENUS
			[
				'content_type_id' => 2,
				'columns'			=> NULL,
				'fields' 			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// CONTENT TYPES
			[
				'content_type_id' => 3,
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
						'key' => 'plural',
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
						'label' => 'Menu Order',
						'placeholder' => '1',
						'desc' => '',
						'validate' => 'required|integer',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'singular',
						'label' => 'Singular Label',
						'placeholder' => 'Singular Label',
						'desc' => 'The singular form of the label you wish to use. (i.e. Item)',
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'plural',
						'label' => 'Plural Label',
						'placeholder' => 'Plural Label',
						'desc' => 'The plural form of the label you wish to use. (i.e. Items)',
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'icon',
						'label' => 'Icon',
						'placeholder' => 'fa-user-circle',
						'desc' => 'The Font Awesome icon identifier.',
						'validate' => 'required',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'slug',
						'label' => 'Slug',
						'placeholder' => 'slug',
						'desc' => 'Usually the plural form of the label, but it can be whatever you would like. Needs to be unique from any other content type slug.',
						'validate' => 'required|unique:App\Models\ContentType,slug',
					],
					[
						'type' => 'admin-fields.text',
						'class' => '',
						'id' => 'desc',
						'label' => 'Description',
						'placeholder' => 'Description',
						'desc' => '',
						'validate' => '',
					],
					[
						'type' => 'admin-fields.category',
						'class' => '',
						'id' => 'category_id',
						'label' => 'Category',
						'placeholder' => 'Please select one',
						'desc' => '',
						'validate' => 'required',
					],
				]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// OPTIONS
			[
				'content_type_id' => 4,
				'columns'			=> NULL,
				'fields' 			=> json_encode([]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// PAGES
			[
				'content_type_id' => 5,
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
				'content_type_id' => 6,
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
				'content_type_id' => 7,
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
				'content_type_id' => 8,
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
				'content_type_id' => 9,
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
						'label' => 'Title',
						'placeholder' => 'Content Title',
						'desc' => '',
					],
					[
						'type' => 'admin-fields.tiny',
						'class' => '',
						'id' => 'quote',
						'label' => 'Quote',
						'placeholder' => 'For many of us, inspiration is triggered by the quips and quotations of others.',
						'desc' => '',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'author',
						'label' => 'Author',
						'placeholder' => 'Emilee Day',
						'desc' => '',
					],
					[
						'type' => 'admin-fields.string',
						'class' => '',
						'id' => 'trip',
						'label' => 'Trip',
						'placeholder' => 'Haiti 2023',
						'desc' => '',
					],
				]),
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			// TRIPS
			[
				'content_type_id' => 10,
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
				'content_type_id' => 11,
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
				'content_type_id' => 12,
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
				'content_type_id' => 13,
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
				'content_type_id' => 14,
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
				'content_type_id' => 15,
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
