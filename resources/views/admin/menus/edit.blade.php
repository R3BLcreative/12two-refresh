<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext">

			<x-acomponents::create-button route="{{ route('admin.menus.create') }}" />
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden"></div>
	</x-slot:main>

</x-layouts::admin>