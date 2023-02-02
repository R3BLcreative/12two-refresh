<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('categories')->insert([
			[
				'order'				=> 1,
				'label'				=> 'Setting',
				'slug'				=> 'settings',
				'force_single' => false,
				'protected'		=> true,
				'required'		=> true,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 2,
				'label'				=> 'Collection',
				'slug'				=> 'collection-types',
				'force_single' => false,
				'protected'		=> true,
				'required'		=> true,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 3,
				'label'				=> 'Mission',
				'slug'				=> 'missions',
				'force_single' => false,
				'protected'		=> false,
				'required'		=> false,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 4,
				'label'				=> 'Ecommerce',
				'slug'				=> 'ecommerce',
				'force_single' => true,
				'protected'		=> false,
				'required'		=> false,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 5,
				'label'				=> 'Marketing',
				'slug'				=> 'marketing',
				'force_single' => true,
				'protected'		=> false,
				'required'		=> false,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
		]);
	}
}
