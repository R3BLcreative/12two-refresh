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

	<x-afields::string
		id="title"
		label="Title"
		placeholder="Some Title"
		value="{{ $item->meta->title ?? old('title') }}"
		required="1"
		desc="The permission slug will be auto generated based on what is entered here." />

	<x-afields::text
		id="desc"
		label="Decsription"
		placeholder="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
		value="{{ $item->meta->desc ?? old('desc') }}"
		desc="Use this field to describe the purpose and usage." />

	@if($slug == 'roles')
		@php
			// Set values array
			$values = (isset($item)) ? array_flip($item->getAllPermissions()->pluck('name')->toArray()) : old('permissions');
		@endphp

		<x-afields::checkbox
			id="permissions"
			label="Permissions"
			desc="Use this section to assign this role to at least one of the following permissions."
			required="1"
			:values="$values"
			:options="$permissions" />
	@else
		@php
			// Super admins don't need permissions assigned to them so remove the option
			unset($roles['super']);

			// Set values array
			$values = (isset($item)) ? array_flip($item->getRoleNames()->toArray()) : old('roles');
		@endphp

		<x-afields::checkbox
			id="roles"
			label="Roles"
			desc="Use this section to assign this permission to at least one of the following roles."
			required="1"
			:values="$values"
			:options="$roles" />
	@endif

	<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-acomponents::button>
</form>