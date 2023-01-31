<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $contentType->plural,
	]">

	<x-slot:main>
		<x-components::admin-titlebar :icon="$contentType->icon" :subtext="$contentType->desc">
			{!! $contentType->plural !!}
		</x-components::admin-titlebar>
	</x-slot:main>

</x-layouts::admin>