@props([
	'class',
	'id',
	'label',
	'value' => '',
	'placeholder',
	'desc',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-admin-fields::label :id="$id">{!! $label !!}</x-admin-fields::label>
	@endisset

	<textarea
		id="{{ $id }}"
		name="{{ $id }}"
		placeholder="{{ $placeholder ?? '' }}"
		class="w-full">{{ $value ?? '' }}</textarea>

	@isset($desc)
		<div class="">{!! $desc !!}</div>
	@endisset
</div>