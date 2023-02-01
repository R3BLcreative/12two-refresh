<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $contentType->plural,
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$contentType->icon"
			:title="$contentType->plural"
			:subtext="$contentType->desc">
			<x-components::admin-button
				tag="a"
				href="{{ route('admin.add', ['slug' => $contentType->slug]) }}"
				style="primary"
				size="small"
				icon="fa-plus">

				New {{ $contentType->singular }}
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative overflow-auto">
			@php
				if($contentType->slug == 'users') {
					$grid = 'grid-cols-users';
				}elseif($contentType->slug == 'content-types') {
					$grid = 'grid-cols-content-types';
				}else{
					$grid = 'grid-cols-content';
				}
			@endphp
			<x-components::admin-table :columns="$contentType->contentTypeMeta->columns" :items="$items" :slug="$contentType->slug" :grid="$grid" />
		</div>
	</x-slot:main>

</x-layouts::admin>