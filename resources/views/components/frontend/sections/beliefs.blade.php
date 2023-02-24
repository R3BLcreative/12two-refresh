<x-sections::section>
	<row class="!items-stretch">
		<div class="col-span-full">
			<x-components::heading tag="h2" style="h2" class="text-center">
				Our Core Beliefs
			</x-components::heading>
		</div>

		@php
			$cards = [
				[
					'image' => 'img_beliefs_001.jpg',
					'alt' => "An image of a Bible's spine",
					'text' => "The Bible is the inspired Word of God. It is authoritative, infallible, and the foundation of truth in the original writings.",
				],
				[
					'image' => 'img_beliefs_002.jpg',
					'alt' => "An image of a crown of thornes",
					'text' => "In the deity, virgin birth, sinless life, miracles, vicarious and atoning death, bodily resurrection, ascension, and return of Jesus.",
				],
				[
					'image' => 'img_beliefs_003.jpg',
					'alt' => "An image of a stained-glass window with images representing the Father (a hand), Son (a lamb), and Holy Spirit (a falling dove).",
					'text' => "In one God, eternally existent in three persons: Father, Son, and Holy Spirit.",
				],
				[
					'image' => 'img_beliefs_004.jpg',
					'alt' => "An image of Jesus holding out His hand in a welcoming fashion.",
					'text' => "That faith in Jesus is essential for the salvation of a lost and sinful humanity.",
				],
				[
					'image' => 'img_beliefs_005.jpg',
					'alt' => "An image of a stained-glass window with a raising dove at the center with sun rays behind it.",
					'text' => "In the present ministry of the Holy Spirit who's indwelling enables us to live a godly life.",
				],
				[
					'image' => 'img_beliefs_006.jpg',
					'alt' => "An image of a cross",
					'text' => "In the forgiveness of sins, the resurrection of the body, and eternal life.",
				],
			];
		@endphp

		@foreach ($cards as $card)
			<x-components::card-belief :image="$card['image']" :alt="$card['alt']">
				{!! $card['text'] !!}
			</x-components::card-belief>
		@endforeach
	</row>
</x-sections::section>