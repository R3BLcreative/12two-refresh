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
	<x-acomponents::tabs :tabs="$tabs" />
	{{-- UPDATE FORM --}}
	<x-aforms::options
		:action="route('admin.options.update', ['slug' => $slug])"
		method="put"
		btnStyle="primary"
		btnIcon="fa-up-from-bracket"
		btnText="Update"
		:fields="$fields" />
@endsection