<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext">

			<x-acomponents::create-button route="{{ route('admin.users.create') }}" />
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- TABS --}}
			@can('manage-backend')
				<x-acomponents::tabs :tabs="[
					[
						'expanded' => 'true',
						'href' => route('admin.users.index'),
						'label' => 'Users',
					],
					[
						'expanded' => 'false',
						'href' => route('admin.permissions.index'),
						'label' => 'Permissions',
					],
				]" />
			@endcan

			{{-- USERS LIST --}}
			<x-acomponents::users-table :users="$users" />
		</div>
	</x-slot:main>

</x-layouts::admin>