@props([
	'id',
	'action',
	'method',
	'item',
	'collectionType',
	'btnStyle',
	'btnText',
	'btnIcon'
])

<form
	action="{{ $action }}"
	method="post"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain bg-surface-light-500 p-8"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method($method)

	@foreach ($collectionType->meta->fields as $field)
		@if(($method == 'post' && in_array('create', $field->forms)) || ($method == 'put' && in_array('edit', $field->forms)))
			<x-dynamic-component
				component="{{ 'admin.fields.' . $field->type }}"
				:class="$field->class"
				:id="$field->id"
				:label="$field->label"
				value="{{ $item->{$field->id} ?? old($field->id) }}"
				:placeholder="$field->placeholder"
				:desc="$field->desc"
				:required="$field->required"
				:collectionType="$collectionType" />
		@endif
	@endforeach

	<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-acomponents::button>
</form>