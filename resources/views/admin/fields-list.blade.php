<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-components::admin-titlebar
			icon="fa-pen-field"
			title="{{ $collectionType->label . ' Fields' }}"
			subtext="{{ 'Edit the available editable fields for ' . Str::plural($collectionType->label) }}">

			<x-components::admin-button
				tag="a"
				href="{{ route('admin.fields.add', ['slug' => $collectionType->slug]) }}"
				style="primary"
				size="small"
				icon="fa-plus">

				Add New Field
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-components::admin-table :columns="$columns" :items="$items" :slug="$collectionType->slug" />
		</div>
	</x-slot:main>

</x-layouts::admin>