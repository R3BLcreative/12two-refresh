@props([
	'id',
	'action',
	'method',
	'item',
	'contentType',
	'btnStyle',
	'btnText',
	'btnIcon'
])

<form
	action="{{ $action }}"
	method="{{ $method }}"
	class="grid grid-cols-8 gap-7"
>
	@csrf
	@method($method)

	@isset($item)
		<input type="hidden" name="id" value="{{ $item->id }}" />
		<input type="hidden" name="slug" value="{{ $item->slug }}" />

		@foreach ($item->contentType->contentTypeMeta->fields as $field)
			<x-dynamic-component
				:component="$field->type"
				:class="$field->class"
				:id="$field->id"
				:label="$field->label"
				value="{{ $item->fields->{$field->id} ?? '' }}"
				:placeholder="$field->placeholder"
				:desc="$field->desc" />
		@endforeach
	@else
		<input type="hidden" name="slug" value="{{ $contentType->slug }}" />

		@foreach ($contentType->contentTypeMeta->fields as $field)
			<x-dynamic-component
				:component="$field->type"
				:class="$field->class"
				:id="$field->id"
				:label="$field->label"
				value="{{ old($field->id) ?? '' }}"
				:placeholder="$field->placeholder"
				:desc="$field->desc" />
		@endforeach
	@endisset

	<x-components::admin-button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-components::admin-button>
</form>