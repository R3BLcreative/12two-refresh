@props([
	'id',
	'action',
	'method',
	'fields',
	'btnStyle',
	'btnText',
	'btnIcon'
])

<form
	action="{{ $action }}"
	method="{{ $method }}"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8"
>
	@csrf
	@method($method)

	@foreach ($fields as $field)
		<x-dynamic-component
			component="admin-fields.{{ $field['data_type'] }}"
			class=""
			:id="$field['name']"
			:label="$field['label']"
			:value="$field['value']"
			:placeholder="$field['placeholder']"
			:desc="$field['desc']"
			:required="$field['required']"
		/>
	@endforeach

	<x-components::admin-button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-components::admin-button>
</form>