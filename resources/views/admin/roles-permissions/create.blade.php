@extends('layouts.admin')

@section('title', $title)

@section('main')
	<x-acomponents::titlebar
		:icon="$icon"
		:title="$title"
		:subtext="$subtext">
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
					'expanded' => ($slug == 'roles') ? 'true' : 'false',
					'href' => route('admin.roles-permissions.index', ['slug' => 'roles']),
					'label' => 'Roles',
				],
				[
					'expanded' => ($slug == 'permissions') ? 'true' : 'false',
					'href' => route('admin.roles-permissions.index', ['slug' => 'permissions']),
					'label' => 'Permissions',
				],
			]" />
		@endcan

		{{-- CREATE FORM --}}
		<x-aforms::roles-permissions
			:action="route('admin.roles-permissions.store', ['slug' => $slug])"
			method="post"
			btnStyle="primary"
			btnIcon="fa-up-from-bracket"
			btnText="Create"
			:slug="$slug" />
	</div>
@endsection