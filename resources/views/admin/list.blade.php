<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $contentType->plural,
	]">

	<x-slot:main>
		<x-components::admin-titlebar :icon="$contentType->icon" :subtext="$contentType->desc">
			{!! $contentType->plural !!}
		</x-components::admin-titlebar>

		<div class="w-full relative overflow-auto">
			<x-components::admin-table :columns="$columns" :items="$items" :slug="$contentType->slug" grid="grid-cols-content" />
		</div>
	</x-slot:main>

</x-layouts::admin>