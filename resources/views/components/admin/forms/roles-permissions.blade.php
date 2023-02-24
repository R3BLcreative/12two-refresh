@props([
	'id',
	'action',
	'method',
	'btnStyle',
	'btnText',
	'btnIcon',
	'item',
	'slug'
])

<form
	action="{{ $action }}"
	method="post"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8 border-t border-gray-300"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method($method)

	<x-admin.fields.input
		id="title"
		label="Title"
		placeholder="Some Title"
		value="{{ $item->meta->title ?? old('title') }}"
		required="1"
		desc="The permission slug will be auto generated based on what is entered here." />

	<x-admin.fields.text
		id="desc"
		label="Decsription"
		placeholder="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
		value="{{ $item->meta->desc ?? old('desc') }}"
		desc="Use this field to describe the purpose and usage." />

	@if($slug == 'roles')
		@php
			// Set values array
			$value = (isset($item)) ? array_flip($item->getAllPermissions()->pluck('name')->toArray()) : old('permissions');
		@endphp

		<x-admin.fields.checkbox
			type="permissions"
			id="permissions"
			label="Permissions"
			desc="Use this section to assign this role to at least one of the following permissions."
			required="1"
			:$value />
	@else
		@php
			// Set values array
			$value = (isset($item)) ? array_flip($item->getRoleNames()->toArray()) : old('roles');
		@endphp

		<x-admin.fields.checkbox
			type="roles"
			id="roles"
			label="Roles"
			desc="Use this section to assign this permission to at least one of the following roles."
			required="1"
			:$value />
	@endif

	<div class="col-span-full flex justify-end">
		<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
			{!! $btnText !!}
		</x-acomponents::button>
	</div>
</form>