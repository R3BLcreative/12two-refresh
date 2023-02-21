<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext">
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- EDIT FORM --}}
			<x-aforms::edit-menu
				:action="route('admin.menus.update', [$menu])"
				method="put"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
				:menu="$menu" />
		</div>
	</x-slot:main>

</x-layouts::admin>