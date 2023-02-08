<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$collectionType->icon"
			:title="Str::plural($collectionType->label)"
			:subtext="$collectionType->desc"></x-components::admin-titlebar>
	</x-slot:main>

</x-layouts::admin>