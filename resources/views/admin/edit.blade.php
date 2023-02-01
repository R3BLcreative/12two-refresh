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
				href="{{ route('admin.add', ['slug' => $item->contentType->slug]) }}"
				style="primary"
				size="small"
				icon="fa-plus">

				New {{ $item->contentType->singular }}
			</x-components::admin-button>
		</x-components::admin-titlebar>

		<div class="w-full relative overflow-auto bg-surface-light-500 p-8">
			<x-forms::admin-form
				id="admin-edit-form"
				action="{{ route('admin.edit', ['slug' => $item->contentType->slug, 'id' => $item->id]) }}"
				method="post"
				:item="$item"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>