<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext">

			<x-acomponents::create-button :route="route('admin.permissions.create')" />
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- TABS --}}
			@can('manage-backend')
				<x-acomponents::tabs :tabs="[
					[
						'expanded' => 'false',
						'href' => route('admin.users.index'),
						'label' => 'Users',
					],
					[
						'expanded' => 'true',
						'href' => route('admin.permissions.index'),
						'label' => 'Permissions',
					],
				]" />
			@endcan

			{{-- PERMISSIONS LIST --}}
			<x-acomponents::permissions-table :permissions="$permissions" />
		</div>
	</x-slot:main>

</x-layouts::admin>