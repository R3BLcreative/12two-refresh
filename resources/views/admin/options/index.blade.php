<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext"></x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- TABS --}}
			<x-acomponents::tabs :tabs="$tabs" />
			{{-- UPDATE FORM --}}
			<x-aforms::options
				:action="route('admin.options.update', ['slug' => $slug])"
				method="put"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
				:fields="$fields" />
		</div>
	</x-slot:main>

</x-layouts::admin>