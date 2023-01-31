<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class ContentTypeCatSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('content_type_cats')->insert([
			[
				'order'				=> 1,
				'singular'		=> 'Setting',
				'plural'			=> 'Settings',
				'slug'				=> 'settings',
				'desc'				=> 'Backend controls & options',
				'protected'		=> true,
				'required'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 2,
				'singular'		=> 'Content',
				'plural'			=> 'Content',
				'slug'				=> 'content-types',
				'desc'				=> 'The meat of your frontend',
				'protected'		=> true,
				'required'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 3,
				'singular'		=> 'Trip',
				'plural'			=> 'Trips',
				'slug'				=> 'trips',
				'desc'				=> 'Your missions manager',
				'protected'		=> false,
				'required'		=> false,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 4,
				'singular'		=> 'Ecommerce',
				'plural'			=> 'Ecommerce',
				'slug'				=> 'ecommerce',
				'desc'				=> 'Payments, donations, etc.',
				'protected'		=> false,
				'required'		=> false,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
		]);
	}
}
