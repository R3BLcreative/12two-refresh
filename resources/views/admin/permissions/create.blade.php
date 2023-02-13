<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext">
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- CREATE FORM --}}
			<x-aforms::permissions
				:action="route('admin.permissions.store')"
				method="post"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Create" />
		</div>
	</x-slot:main>

</x-layouts::admin>