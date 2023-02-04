<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - Edit',
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			icon="fa-pen-to-square"
			title="Edit"
			subtext="">

			<x-components::admin-button
				tag="a"
				href="{{ route('admin.add', ['slug' => $item->collectionType->slug]) }}"
				style="primary"
				icon="fa-plus">

				New
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-forms::admin-form
				id="admin-edit-form"
				action="{{ route('admin.update') }}"
				method="post"
				:item="$item"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>