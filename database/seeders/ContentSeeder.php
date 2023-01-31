<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class ContentSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('contents')->insert([
			[
				'title'							=> 'Dani, Haiti 2017',
				'slug'							=> 'dani-haiti-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'fields' => [
						'quote' => [
							'type' => 'text',
							'value' => "James is one of the most inspiring people I have ever met. His testimony spoke to me so much and showed me what real grace is."
						],
						'author' => [
							'type' => 'string',
							'value' => 'Dani'
						],
						'trip' => [
							'type' => 'string',
							'value' => 'Haiti 2017',
						]
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Anissa, Haiti 2017',
				'slug'							=> 'anissa-haiti-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "I am so thankful God has put you in my life, and how He has used your story. You have inspired me to not be ashamed of my story because there is power in sharing it. You are a true story of who God is! Thank you!"
					],
					'author' => [
						'type' => 'string',
						'value' => 'Anissa'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'Haiti 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Haley, NOLA 2017',
				'slug'							=> 'haley-nola-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "You've helped me on my journey & taught me to keep fighting, keep pushing, and to go head first into the Lord's will. Thank you is an under-statement, but I am grateful for you and all your words of wisdom!"
					],
					'author' => [
						'type' => 'string',
						'value' => 'Haley'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'NOLA 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Emily, Haiti 2017',
				'slug'							=> 'emily-haiti-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "You have changed my life in ways you can't imagine. Your wisdom, authenticity, leadership, and humor blows me away. I will never ever forget you!"
					],
					'author' => [
						'type' => 'string',
						'value' => 'Emily'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'Haiti 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Kristin, Haiti 2017',
				'slug'							=> 'kristin-haiti-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "You lead with your whole heart and serve with your entire being. Thank you for being our guide and more importantly our friend."
					],
					'author' => [
						'type' => 'string',
						'value' => 'Kristin'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'Haiti 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Kayce, Haiti 2014',
				'slug'							=> 'kayce-haiti-2014',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "Your words inspire everyone around you and your light shines so brightly. Thank you so much for baptizing me - I won't ever forget it!"
					],
					'author' => [
						'type' => 'string',
						'value' => 'Kayce'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'Haiti 2014'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Christine, Haiti 2016',
				'slug'							=> 'christine-haiti-2016',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "This has been the hardest week ever, but I'm so thankful for the opportunity to come to Haiti. Thank you for following God's calling and allowing me to be involved in it!"
					],
					'author' => [
						'type' => 'string',
						'value' => 'Christine'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'Haiti 2016'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Brooke, NOLA 2017',
				'slug'							=> 'brooke-nola-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "Words can't begin to describe how much you have taught me this week. God has used you to change so many lives. I will constantly pray for your mission."
					],
					'author' => [
						'type' => 'string',
						'value' => 'Brooke'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'NOLA 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Isaac, NOLA 2017',
				'slug'							=> 'isaac-nola-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "It has been evident from day one that God has His hand on your life. I have been around pastors & missionaries for a very long time, but God has given you a unique power and love. Keep pouring it back out."
					],
					'author' => [
						'type' => 'string',
						'value' => 'Isaac'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'NOLA 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Madison, NOLA 2017',
				'slug'							=> 'madison-nola-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "God had a great spiritual awakening for this team. Thanks for guiding me and encouraging me to get out of my comfort zone!"
					],
					'author' => [
						'type' => 'string',
						'value' => 'Madison'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'NOLA 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			],
			[
				'title'							=> 'Charity, Gainesville 2017',
				'slug'							=> 'charity-gainesville-2017',
				'desc'							=> NULL,
				'content_type_id'		=> 9,
				'props'							=> json_encode([
					'quote' => [
						'type' => 'text',
						'value' => "You have touched all of our lives & I want to thank you for all you have done this week."
					],
					'author' => [
						'type' => 'string',
						'value' => 'Charity'
					],
					'trip' => [
						'type' => 'string',
						'value' => 'Gainesville 2017'
					]
				]),
				'meta'							=> NULL,
				'created_at'				=> Carbon::now(),
				'updated_at'				=> Carbon::now(),
			]
		]);
	}
}
