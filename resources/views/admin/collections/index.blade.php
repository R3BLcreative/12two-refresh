<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$collectionType->icon"
			:title="$title"
			:subtext="$collectionType->desc">

			<x-acomponents::create-button :collectionType="$collectionType" />
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-acomponents::table :items="$items" :collectionType="$collectionType" />
		</div>
	</x-slot:main>

</x-layouts::admin>