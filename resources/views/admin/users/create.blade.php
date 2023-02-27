@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		:icon="$page['icon']"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''"></x-acomponents::titlebar>
@endsection

@section('main')
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
@endsection