@extends('layouts.admin')

@section('title', $title)

@section('main')
	<x-acomponents::titlebar
		icon="fa-pen-to-square"
		:title="$title"
		subtext="{{ $subtext ?? '' }}">

		<x-acomponents::create-button route="{{ route('admin.collections.create', $collectionType) }}" />
	</x-acomponents::titlebar>

	<div class="w-full relative flex flex-col flex-auto overflow-hidden">
		{{-- TABS --}}
		@if(isset($item->allow_form_builder) && $item->allow_form_builder === true)
			<x-acomponents::tabs :tabs="[
				[
					'expanded' => 'true',
					'href' => route('admin.collections.edit', [$collectionType, $item->id]),
					'label' => 'General',
				],
				[
					'expanded' => 'false',
					'href' => route('admin.collections.form', [$collectionType, $item->id]),
					'label' => 'Form Builder',
				],
			]" />
		@endif


		{{-- EDIT FORM --}}
		<x-aforms::collections
			id="admin-edit-form"
			action="{{ route('admin.collections.update', [$collectionType, $item->id]) }}"
			method="put"
			:item="$item"
			:collectionType="$collectionType"
			btnStyle="primary"
			btnIcon="fa-up-from-bracket"
			btnText="Update"
		/>
	</div>
@endsection