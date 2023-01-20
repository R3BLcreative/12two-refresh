<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Our Beliefs',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::hero title="Values & Beliefs" image="" alt="">
			<x-slot:body>
				<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod. Morbi fringilla convallis sapien, id pulvinar odio volutpat. Me non paenitet nullum festiviorem excogitasse ad hoc. Hi omnes lingua, institutis, legibus inter se differunt.</p>
			</x-slot:body>
		</x-sections::hero>

		<x-sections::quote author="Roy E. Disney">
			When your values are clear to you, making decisions becomes easier.
		</x-sections::quote>

		{{-- CORE VALUES --}}
		<x-sections::values />

		{{-- BELIEFS --}}
		<x-sections::beliefs />
	</x-slot:main>

</x-layouts::default>