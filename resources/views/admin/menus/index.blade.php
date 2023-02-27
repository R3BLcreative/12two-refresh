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
	{{-- CREATE FORM --}}
	<x-aforms::new-menu
		:action="route('admin.menus.store')"
		method="post"
		btnStyle="primary"
		btnIcon="fa-up-from-bracket"
		btnText="Create" />

	{{-- MENU LIST --}}
	<x-acomponents::menus-table :items="$items" />
@endsection