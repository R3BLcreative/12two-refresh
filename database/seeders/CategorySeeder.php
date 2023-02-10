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
				'permission'	=> 'manage content',
				'protected'		=> true,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 2,
				'label'				=> 'Collection',
				'slug'				=> 'collection-types',
				'force_single' => false,
				'permission'	=> 'edit content',
				'protected'		=> true,
				'type'				=> 'collection-type',
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
		]);
	}
}
