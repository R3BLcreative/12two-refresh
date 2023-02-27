@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		:icon="$collectionType->icon"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''">

		<x-acomponents::create-button route="{{ route('admin.collections.create', $collectionType) }}" />
	</x-acomponents::titlebar>
@endsection

@section('main')
	<x-acomponents::collections-table :items="$items" :collectionType="$collectionType" />
@endsection