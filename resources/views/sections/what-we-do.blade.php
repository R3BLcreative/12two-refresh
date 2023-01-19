<x-sections::section>
			<row>
				<div class="col-span-full text-center">
					<x-components::heading tag="h2" style="h2" class="text-center">
						What we do
					</x-components::heading>

					<p class="text-center text-lg !my-8">Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod. Morbi fringilla convallis sapien, id pulvinar odio volutpat. Me non paenitet nullum festiviorem excogitasse ad hoc. Hi omnes lingua, institutis, legibus inter se differunt.</p>
				</div>
			</row>

			@php
				$cards = [
					[
						'image' => 'img_individualTrips.jpg',
						'alt' => 'A young woman hugging a young child on a dirt road.',
						'title' => 'Individual Trips',
						'text' => 'We plan and organize regular domestic & foreign trips every year that are open for individuals and families to participate on.',
						'href' => '#'
					],
					[
						'image' => 'img_groupTrips.jpg',
						'alt' => 'A large group of teenagers and adults posing in front of a church bus.',
						'title' => 'Group Trips',
						'text' => 'Want to include missions as part of your group culture, but lacking the time and resources? Let us do the planning instead!',
						'href' => '#'
					],
					[
						'image' => 'img_teaching.jpg',
						'alt' => 'An image of a young man with a tattoo reading the Bible',
						'title' => 'Long-Term Missions',
						'text' => '',
						'href' => '#'
					],
					[
						'image' => 'img_teaching.jpg',
						'alt' => 'An image of a young man with a tattoo reading the Bible',
						'title' => 'Disaster Relief',
						'text' => '',
						'href' => '#'
					],
					[
						'image' => 'img_individualTrips.jpg',
						'alt' => 'A young woman hugging a young child on a dirt road.',
						'title' => 'Sports',
						'text' => '',
						'href' => '#'
					],
					[
						'image' => 'img_groupTrips.jpg',
						'alt' => 'A large group of teenagers and adults posing in front of a church bus.',
						'title' => 'Church Planting',
						'text' => '',
						'href' => '#'
					],
					[
						'image' => 'img_teaching.jpg',
						'alt' => 'An image of a young man with a tattoo reading the Bible',
						'title' => 'Leadership Training',
						'text' => '',
						'href' => '#'
					],
					[
						'image' => 'img_teaching.jpg',
						'alt' => 'An image of a young man with a tattoo reading the Bible',
						'title' => 'Teaching',
						'text' => 'Book us to preach or teach at your next revival, DNOW, or other ministry event.',
						'href' => '#'
					],
				];
			@endphp
			<row class="!items-stretch !gap-5">

				@foreach ($cards as $card)
					<x-components::card-do :image="$card['image']" :alt="$card['alt']" :title="$card['title']" :text="$card['text']" :href="$card['href']" />
				@endforeach

			</row>
		</x-sections::section>