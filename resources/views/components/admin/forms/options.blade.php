@props([
	'id',
	'action',
	'method',
	'btnStyle',
	'btnText',
	'btnIcon',
	'fields',
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

	@foreach ($fields as $field)
		<x-dynamic-component
			component="{{ 'admin.fields.' . $field['type'] }}"
			class="{{ $field['class'] ?? '' }}"
			:id="$field['name']"
			:label="$field['label']"
			value="{{ old($field['name']) ?? option($field['name']) }}"
			placeholder="{{ $field['placeholder'] ?? '' }}"
			desc="{{ $field['desc'] ?? '' }}"
			required="{{ $field['required'] ?? '' }}"
			:options="$field['options'] ?? []" />
	@endforeach

	<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-acomponents::button>
</form>