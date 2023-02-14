<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			:icon="$icon"
			:title="$title"
			:subtext="$subtext"></x-acomponents::titlebar>

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
						'href' => route('admin.roles-permissions.index', ['slug' => 'roles']),
						'label' => 'Roles',
					],
					[
						'expanded' => 'false',
						'href' => route('admin.roles-permissions.index', ['slug' => 'permissions']),
						'label' => 'Permissions',
					],
				]" />
			@endcan

			{{-- FORM --}}
			<x-aforms::new-user />
		</div>
	</x-slot:main>

</x-layouts::admin>