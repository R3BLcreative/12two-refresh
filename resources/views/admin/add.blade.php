<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - Add New ' . $contentType->singular,
	]">

	<x-slot:main>
		<x-components::admin-titlebar
			:icon="$contentType->icon"
			title="Add New {{ $contentType->singular }}"
			subtext=""
		></x-components::admin-titlebar>

		<div class="w-full relative overflow-auto bg-surface-light-500 p-8">
			<x-forms::admin-form
				id="admin-add-form"
				action="{{ route('admin.create') }}"
				method="post"
				:contentType="$contentType"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Create"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>