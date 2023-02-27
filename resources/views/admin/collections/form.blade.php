@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		icon="fa-clipboard-list"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''">

		{{-- <x-acomponents::create-button route="{{ route('admin.collections.create', $collectionType) }}" /> --}}
	</x-acomponents::titlebar>
@endsection

@section('main')
	{{-- TABS --}}
	@if(isset($item->allow_form_builder) && $item->allow_form_builder === true)
		<x-acomponents::tabs :tabs="[
			[
				'expanded' => 'false',
				'href' => route('admin.collections.edit', [$collectionType, $item->id]),
				'label' => 'General',
			],
			[
				'expanded' => 'true',
				'href' => route('admin.collections.form', [$collectionType, $item->id]),
				'label' => 'Form Builder',
			],
		]" />
	@endif


	{{-- EDIT FORM --}}
	<x-aforms::form-builder
		id="admin-form-builder"
		action="{{ route('admin.collections.form.update', [$collectionType, $item->id]) }}"
		method="put"
		:item="$item"
		:collectionType="$collectionType"
		btnStyle="primary"
		btnIcon="fa-up-from-bracket"
		btnText="Update"
	/>
@endsection