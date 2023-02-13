<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class CollectionTypeSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('collection_types')->insert([
			[
				'order'				=> 1,
				'label'				=> 'Collection Type',
				'icon'				=> 'fa-chart-tree-map',
				'slug'				=> 'collection-types',
				'desc'				=> 'Manage frontend & backend collection types',
				'category_id'	=> 1,
				'force_single' => false,
				'permission'	=> 'manage-backend',
				'protected'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 2,
				'label'				=> 'Category',
				'icon'				=> 'fa-list-tree',
				'slug'				=> 'categories',
				'desc'				=> 'Manage all frontend & backend categories',
				'category_id'	=> 1,
				'force_single' => false,
				'permission'	=> 'manage-backend',
				'protected'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 1,
				'label'				=> 'Page',
				'icon'				=> 'fa-files',
				'slug'				=> 'pages',
				'desc'				=> 'Static content pages',
				'category_id'	=> 2,
				'force_single' => false,
				'permission'	=> 'edit-content',
				'protected'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 2,
				'label'				=> 'Post',
				'icon'				=> 'fa-typewriter',
				'slug'				=> 'posts',
				'desc'				=> 'Share news, updates, and ideas for your audience through a blog',
				'category_id'	=> 2,
				'force_single' => false,
				'permission'	=> 'edit-content',
				'protected'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 3,
				'label'				=> 'Section',
				'icon'				=> 'fa-diagram-cells',
				'slug'				=> 'sections',
				'desc'				=> 'Pre-defined content layouts that can be re-used',
				'category_id'	=> 2,
				'force_single' => false,
				'permission'	=> 'edit-content',
				'protected'		=> true,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
		]);
	}
}
