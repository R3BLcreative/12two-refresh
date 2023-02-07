<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - Add Field',
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			icon="fa-pen-field"
			title="Add Field"
			subtext=""></x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-admin-forms::fields
				id="admin-fields-form"
				action="{{ route('admin.fields.create', ['slug' => $collectionType->slug]) }}"
				method="post"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Create"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>