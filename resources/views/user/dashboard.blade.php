<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Dashboard',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::section>
			<row>
				<div class="mobile:col-span-full tablet:col-span-3">
					<x-components::heading tag="h1" style="h3" class="whitespace-pre">
						Dashboard
					</x-components::heading>
				</div>
			</row>

			<row class="!items-start">
				<div class="mobile:col-span-full tablet:col-span-3 border border-surface-300 rounded-lg shadow-md bg-surface-50 px-4 py-8 text-body-700">
					Account Nav Here
				</div>
				<div class="mobile:col-span-full tablet:col-span-5 laptop:col-span-9">
					<div class="w-full border border-surface-300 rounded-lg shadow-md bg-surface-50 p-8 text-body-700">
						Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod. Morbi fringilla convallis sapien, id pulvinar odio volutpat. Me non paenitet nullum festiviorem excogitasse ad hoc. Hi omnes lingua, institutis, legibus inter se differunt.
					</div>
				</div>
			</row>
		</x-sections::section>
	</x-slot:main>

</x-layouts::default>