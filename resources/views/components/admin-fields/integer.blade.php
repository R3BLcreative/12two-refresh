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

	<input type="number" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" class="" />

	@isset($desc)
		<div class="">{!! $desc !!}</div>
	@endisset
</div>