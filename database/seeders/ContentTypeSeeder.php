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
				'label'							=> 'Page',
				'slug'							=> 'page',
				'desc'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'label'							=> 'Testimonial',
				'slug'							=> 'testimonial',
				'desc'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'label'							=> 'FAQ',
				'slug'							=> 'faq',
				'desc'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'label'							=> 'Section',
				'slug'							=> 'section',
				'desc'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			]
		]);
	}
}
