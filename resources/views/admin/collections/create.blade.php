@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		icon="fa-square-plus"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''"
	></x-acomponents::titlebar>
@endsection

@section('main')
	<x-aforms::collections
		id="admin-add-form"
		action="{{ route('admin.collections.store', [$collectionType]) }}"
		method="post"
		:collectionType="$collectionType"
		btnStyle="primary"
		btnIcon="fa-up-from-bracket"
		btnText="Create"
	/>
@endsection