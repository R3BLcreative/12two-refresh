@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		:icon="$page['icon']"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''">

		<x-acomponents::create-button :route="route('admin.roles-permissions.create', ['slug' => $slug])" />
	</x-acomponents::titlebar>
@endsection

@section('main')
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

	{{-- UPDATE FORM --}}
	<x-aforms::roles-permissions
		:action="route('admin.roles-permissions.update', ['slug' => $slug, $item])"
		method="patch"
		btnStyle="primary"
		btnIcon="fa-up-from-bracket"
		btnText="Update"
		:item="$item"
		:slug="$slug" />
@endsection