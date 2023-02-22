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
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8 border-t border-gray-300"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method($method)

	@foreach ($collectionType->fields->items as $field)
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

	<div class="col-span-full flex justify-end">
		<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
			{!! $btnText !!}
		</x-acomponents::button>
	</div>
</form>