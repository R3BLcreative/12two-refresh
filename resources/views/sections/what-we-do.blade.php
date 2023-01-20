<x-sections::section class="bg-cover odd:bg-map-light even:bg-map-white bg-center">
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
						'href' => route('missions')
					],
					[
						'image' => 'img_groupTrips.jpg',
						'alt' => 'A large group of teenagers and adults posing in front of a church bus.',
						'title' => 'Group Trips',
						'href' => route('missions')
					],
					[
						'image' => 'img_longterm.jpg',
						'alt' => 'An image of a young man and a young woman praying with a man in the middle of a park.',
						'title' => 'Long-Term Missions',
						'href' => route('missionaries')
					],
					[
						'image' => 'img_disasterRelief.jpg',
						'alt' => 'An arial image of a hurricane over Florida',
						'title' => 'Disaster Relief',
						'href' => route('disaster-relief')
					],
					[
						'image' => 'img_sports.jpg',
						'alt' => 'An image of a group of men and boys from the 9U Cypress Slam baseball team.',
						'title' => 'Sports',
						'href' => route('sports')
					],
					[
						'image' => 'img_churchPlanting.jpg',
						'alt' => 'An image of three people sitting around a coffee table holding hand in prayer with Bibles opened.',
						'title' => 'Church Planting',
						'href' => route('churches')
					],
					[
						'image' => 'img_leadership.jpg',
						'alt' => 'An image of several teenagers lined up in a row next to train tracks.',
						'title' => 'Leadership Training',
						'href' => route('ambassadors')
					],
					[
						'image' => 'img_teaching.jpg',
						'alt' => 'An image of a young man with a tattoo reading the Bible',
						'title' => 'Teaching',
						'href' => route('teaching')
					],
				];
			@endphp
			<row class="!items-stretch !gap-5 relative">

				@foreach ($cards as $card)
					<x-components::card-do :image="$card['image']" :alt="$card['alt']" :title="$card['title']" :href="$card['href']" />
				@endforeach

			</row>
		</x-sections::section>