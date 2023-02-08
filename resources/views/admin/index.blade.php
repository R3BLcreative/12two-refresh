<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$collectionType->icon"
			:title="$title"
			:subtext="$collectionType->desc">

			<x-components::admin-create-button :collectionType="$collectionType" />
		</x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-components::admin-table :items="$items" :collectionType="$collectionType" />
		</div>
	</x-slot:main>

</x-layouts::admin>