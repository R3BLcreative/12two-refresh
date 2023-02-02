<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - Add New ' . $collectionType->label,
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$collectionType->icon"
			title="Add New {{ $collectionType->label }}"
			subtext=""
		></x-components::admin-titlebar>

		<div class="w-full relative overflow-auto bg-surface-light-500 p-8">
			<x-forms::admin-form
				id="admin-add-form"
				action="{{ route('admin.create') }}"
				method="post"
				:collectionType="$collectionType"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Create"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>