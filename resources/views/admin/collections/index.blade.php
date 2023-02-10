<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$collectionType->icon"
			:title="$title"
			:subtext="$collectionType->desc">

			<x-acomponents::create-button route="{{ route('admin.collections.create', $collectionType) }}" />
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-acomponents::collections-table :items="$items" :collectionType="$collectionType" />
		</div>
	</x-slot:main>

</x-layouts::admin>