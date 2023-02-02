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

				New {{ $collectionType->label }}
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative overflow-auto">
			@php
				if($collectionType->slug == 'users') {
					$grid = 'grid-cols-users';
				}elseif($collectionType->slug == 'collection-types') {
					$grid = 'grid-cols-collection-types';
				}elseif($collectionType->slug == 'categories') {
					$grid = 'grid-cols-categories';
				}else{
					$grid = 'grid-cols-collection';
				}
			@endphp
			<x-components::admin-table :columns="$collectionType->collectionTypeMeta->columns" :items="$items" :slug="$collectionType->slug" :grid="$grid" />
		</div>
	</x-slot:main>

</x-layouts::admin>