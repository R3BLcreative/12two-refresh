<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-components::admin-titlebar
			icon="fa-pen-to-square"
			:title="$title"
			subtext="">

			<x-components::admin-create-button :collectionType="$collectionType" />
		</x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-admin-forms::collections
				id="admin-edit-form"
				action="{{ route('admin.update', [$collectionType, $item->id]) }}"
				method="put"
				:item="$item"
				:collectionType="$collectionType"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>