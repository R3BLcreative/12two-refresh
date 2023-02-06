<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - ' . Str::plural($collectionType->label),
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$collectionType->icon"
			:title="Str::plural($collectionType->label)"
			:subtext="$collectionType->desc"></x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- TABS --}}
			<x-components::admin-tabs :tabs="$tabs" />

			{{-- FORMS --}}
			<div class="overflow-auto overscroll-contain bg-white">
				<x-admin-forms::options
					id="admin-{{ $tab }}-form"
					action="{{ route('admin.options.store', ['tab' => $tab]) }}"
					method="post"
					:fields="$fields"
					btnStyle="primary"
					btnIcon="fa-pen-to-square"
					btnText="Save"
				/>
			</div>
		</div>
	</x-slot:main>

</x-layouts::admin>