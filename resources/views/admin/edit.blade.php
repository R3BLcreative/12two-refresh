<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - Edit',
	]">

	<x-slot:main>
		<x-components::admin-titlebar icon="fa-pen-to-square" subtext="">
			Edit
		</x-components::admin-titlebar>

		<div class="w-full relative overflow-auto bg-surface-light-500 px-8 py-3">
			<form action="{{ route('admin.edit', ['slug' => $item->contentType->slug, 'id' => $item->id]) }}" method="POST" class="">
				@csrf

				@php
					$props = json_decode($item->props);
				@endphp

				@foreach ($props->fields as $fieldID => $field)
					<div>ID: {{ $fieldID }}</div>
					<div>Type: {{ $field->type }}</div>
					<div>Value: {{ $field->value }}</div>
				@endforeach
			</form>
		</div>
	</x-slot:main>

</x-layouts::admin>