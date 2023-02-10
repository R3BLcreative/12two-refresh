<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext"></x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-aforms::new-user />
		</div>
	</x-slot:main>

</x-layouts::admin>