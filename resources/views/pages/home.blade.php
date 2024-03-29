<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Home',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::hero preheader="Transformation is on" title="The Horizon" image="" alt="">
			<x-slot:body>
				<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod. Morbi fringilla convallis sapien, id pulvinar odio volutpat. Me non paenitet nullum festiviorem excogitasse ad hoc. Hi omnes lingua, institutis, legibus inter se differunt.</p>
			</x-slot:body>

			{{-- <x-slot:ctas class="flex flex-row gap-6">
				<x-components::button tag="a" style="secondary" href="#donate">Donate Today</x-components::button>
				<x-components::button tag="a" style="primary" size="small" href="{{ route('faq.category', ['cat' => 'donations']) }}">
					Donation FAQS
				</x-components::button>
			</x-slot:ctas> --}}
		</x-sections::hero>

		{{-- CONNECT FORM --}}
		<x-sections::connect />

		{{-- TESTIMONIALS --}}
		<x-sections::testimonials />

		{{-- WHAT WE DO --}}
		<x-sections::what-we-do />
	</x-slot:main>

</x-layouts::default>