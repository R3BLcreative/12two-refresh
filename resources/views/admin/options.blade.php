<x-layouts::admin
	:contentTypes="$contentTypes"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $title,
	]">

	<x-slot:main>
		<div class="flex items-center gap-4">
			<i class="fa-duotone fa-gears text-7xl"></i>
			<x-components::admin-heading tag="h1" style="h1" :subtext="$desc">
				{!! $title !!}
			</x-components::admin-heading>
		</div>
	</x-slot:main>

</x-layouts::admin>