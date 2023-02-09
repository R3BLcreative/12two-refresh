<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			icon="fa-pen-to-square"
			:title="$title"
			subtext="">

			<x-acomponents::create-button :collectionType="$collectionType" />
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-aforms::collections
				id="admin-edit-form"
				action="{{ route('admin.collections.update', [$collectionType, $item->id]) }}"
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