<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			icon="fa-square-plus"
			:title="$title"
			subtext=""
		></x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-aforms::collections
				id="admin-add-form"
				action="{{ route('admin.collections.store', [$collectionType]) }}"
				method="post"
				:collectionType="$collectionType"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Create"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>