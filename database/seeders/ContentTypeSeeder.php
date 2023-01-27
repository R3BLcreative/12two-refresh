<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class ContentTypeSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('content_types')->insert([
			[
				'order'				=> 1,
				'singular'		=> 'Menu',
				'plural'			=> 'Menus',
				'icon'				=> 'fa-list-dropdown',
				'slug'				=> 'menus',
				'desc'				=> NULL,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 2,
				'singular'		=> 'Page',
				'plural'			=> 'Pages',
				'icon'				=> 'fa-files',
				'slug'				=> 'pages',
				'desc'				=> NULL,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 3,
				'singular'		=> 'Post',
				'plural'			=> 'Posts',
				'icon'				=> 'fa-typewriter',
				'slug'				=> 'posts',
				'desc'				=> NULL,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 4,
				'singular'		=> 'Section',
				'plural'			=> 'Sections',
				'icon'				=> 'fa-diagram-cells',
				'slug'				=> 'sections',
				'desc'				=> NULL,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 5,
				'singular'		=> 'FAQ',
				'plural'			=> 'FAQS',
				'icon'				=> 'fa-block-question',
				'slug'				=> 'faqs',
				'desc'				=> NULL,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
			[
				'order'				=> 6,
				'singular'		=> 'Testimonial',
				'plural'			=> 'Testimonials',
				'icon'				=> 'fa-square-quote',
				'slug'				=> 'testimonials',
				'desc'				=> NULL,
				'created_at'	=> Carbon::now(),
				'updated_at'	=> Carbon::now(),
			],
		]);
	}
}
