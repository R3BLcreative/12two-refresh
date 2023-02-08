<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-components::admin-titlebar
			icon="fa-square-plus"
			:title="$title"
			subtext=""
		></x-components::admin-titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			<x-admin-forms::collections
				id="admin-add-form"
				action="{{ route('admin.store', [$collectionType]) }}"
				method="post"
				:collectionType="$collectionType"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Create"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>