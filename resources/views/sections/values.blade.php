<x-sections::section>
	<row class="!items-stretch">
		<div class="col-span-full">
			<x-components::heading tag="h2" style="h2" class="text-center">
				Our Core Values
			</x-components::heading>
		</div>

		@php
			$cards = [
				[
					'icon' => 'fa-duotone fa-person-rays',
					'title' => "God's Glory",
					'text' => "In everything we do, this is our sole focus and utmost desire <em>(Colossians 3:23)</em>. As a result we will lead with humility; not seeking our own glory or recognition <em>(Philippians 2)</em>.",
				],
				[
					'icon' => 'fa-duotone fa-person-praying',
					'title' => "Faith",
					'text' => "We will not do what is easy nor will we avoid hardship. We will live by faith and not by sight <em>(2 Corinthians 5:7)</em>. God is sovereign and His providence will be sufficient <em>(Philippians 4:19)</em>.",
				],
				[
					'icon' => 'fa-duotone fa-hand-holding-hand',
					'title' => "Servanthood",
					'text' => "All leaders are first servants <em>(2 Corinthians 4:5)</em>. They exist to build up and equip the whole organization, not to be served by the organization <em>(Matthew 20:26)</em>.",
				],
				[
					'icon' => 'fa-duotone fa-arrows-rotate',
					'title' => "Transformation",
					'text' => "Transforming culture starts with the inward transformation of the individual <em>(John 14:6)</em>. First, we will seek this in ourselves, trusting that God will multiply and overflow this into the lives of those we minister to <em>(Romans 12:2)</em>.",
				],
				[
					'icon' => 'fa-duotone fa-book-bible',
					'title' => "Truth",
					'text' => "God is the source and embodiment of all truth. The scriptures, which are His spoken word, are truth. Everything we teach, preach, and speak must be rooted in scripture alone. Tradition and norms must be challenged and tested in the fire of His truth <em>(2 Timothy 3:16-17)</em>.",
				],
				[
					'icon' => 'fa-duotone fa-handshake-angle',
					'title' => "Partnership",
					'text' => "We will not re-invent the wheel. We are not the end all when it comes to revival and as such we will seek to work together as part of the body of Christ <em>(1 Corinthians 12)</em>. Always looking for opportunities to work together to be more effective <em>(Ecclesiastes 4:9-12)</em>.",
				],
			];
		@endphp

		@foreach ($cards as $card)
			<x-components::card-value :icon="$card['icon']" :title="$card['title']">
				{!! $card['text'] !!}
			</x-components::card-value>
		@endforeach
	</row>
</x-sections::section>