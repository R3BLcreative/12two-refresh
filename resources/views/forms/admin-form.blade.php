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
	method="{{ $method }}"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain flex-auto bg-surface-light-500 p-8"
>
	@csrf
	@method($method)

	@isset($item)
		<input type="hidden" name="id" value="{{ $item->id }}" />
		<input type="hidden" name="cslug" value="{{ $item->slug }}" />

		@foreach ($item->collectionType->collectionTypeMeta->fields as $field)
			<x-dynamic-component
				:component="$field->type"
				:class="$field->class"
				:id="$field->id"
				:label="$field->label"
				value="{{ $item->fields->{$field->id} ?? '' }}"
				:placeholder="$field->placeholder"
				:desc="$field->desc"
				:required="$field->required"
				catType="{{ $field->catType ?? '' }}" />
		@endforeach
	@else
		<input type="hidden" name="cslug" value="{{ $collectionType->slug }}" />

		@foreach ($collectionType->collectionTypeMeta->fields as $field)
			<x-dynamic-component
				:component="$field->type"
				:class="$field->class"
				:id="$field->id"
				:label="$field->label"
				value="{{ old($field->id) ?? '' }}"
				:placeholder="$field->placeholder"
				:desc="$field->desc"
				:required="$field->required"
				catType="{{ $field->catType ?? '' }}" />
		@endforeach
	@endisset

	<x-components::admin-button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-components::admin-button>
</form>