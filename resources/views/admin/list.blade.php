<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - ' . Str::plural($collectionType->label),
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$collectionType->icon"
			:title="Str::plural($collectionType->label)"
			:subtext="$collectionType->desc">
			<x-components::admin-button
				tag="a"
				href="{{ route('admin.add', ['slug' => $collectionType->slug]) }}"
				style="primary"
				size="small"
				icon="fa-plus">

				New
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative">
			<x-components::admin-table :columns="$collectionType->collectionTypeMeta->columns" :items="$items" :slug="$collectionType->slug" />
		</div>
	</x-slot:main>

</x-layouts::admin>