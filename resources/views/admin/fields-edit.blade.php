<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - Edit Field',
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			icon="fa-pen-field"
			title="Edit Field"
			subtext="">

			<x-components::admin-button
				tag="a"
				href="{{ route('admin.fields.add', ['slug' => $collectionType->slug]) }}"
				style="primary"
				size="small"
				icon="fa-plus">

				Add New Field
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-admin-forms::fields
				id="admin-fields-form"
				action="{{ route('admin.fields.update', ['slug' => $collectionType->slug]) }}"
				method="post"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>