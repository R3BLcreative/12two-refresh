@extends('layouts.admin')

@section('title', $title)

@section('main')
	<x-acomponents::titlebar
		:icon="$icon"
		:title="$title"
		:subtext="$subtext">
	</x-acomponents::titlebar>

	<div class="w-full relative flex flex-col flex-auto overflow-hidden">
		{{-- CREATE FORM --}}
		<x-aforms::new-menu
			:action="route('admin.menus.store')"
			method="post"
			btnStyle="primary"
			btnIcon="fa-up-from-bracket"
			btnText="Create" />

		{{-- MENU LIST --}}
		<x-acomponents::menus-table :items="$items" />
	</div>
@endsection