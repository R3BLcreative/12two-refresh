@props([
	'class' => '',
	'id',
	'label',
	'value' => '',
	'placeholder' => '',
	'desc' => '',
	'required' => '',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	<input type="number" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" class="text-base @error($id) border-error @enderror" />

	@isset($desc)
		<x-afields::description>{{ $desc }}</x-afields::description>
	@endisset

	@error($id)
		<x-afields::error>{{ $message }}</x-afields::error>
	@enderror
</div>