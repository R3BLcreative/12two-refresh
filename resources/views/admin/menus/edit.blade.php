@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		:icon="$page['icon']"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''">
	</x-acomponents::titlebar>
@endsection

@section('main')
	{{-- EDIT FORM --}}
	<x-aforms::edit-menu
		:action="route('admin.menus.update', [$menu])"
		method="put"
		btnStyle="primary"
		btnIcon="fa-up-from-bracket"
		btnText="Update"
		:menu="$menu" />
@endsection