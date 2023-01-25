<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Password Reset',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::section>
			<row>
				<div class="w-full mobile:col-span-full tablet:col-span-6 tablet:col-start-2 laptop:col-span-6 laptop:col-start-4 flex flex-col gap-6">
					<x-components::heading tag="h1" style="h4" class="text-center">
						Request Password Reset
					</x-components::heading>

					<x-forms::forgot-password />
				</div>
			</row>
		</x-sections::section>
	</x-slot:main>

</x-layouts::default>