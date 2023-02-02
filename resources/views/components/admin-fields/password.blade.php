@props([
	'class',
	'id',
	'label',
	'value' => '',
	'placeholder',
	'desc',
	'required',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-admin-fields::label :id="$id" :required="$required">{!! $label !!}</x-admin-fields::label>
	@endisset

	<input type="password" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" class="@error($id) border-error @enderror" />

	@isset($desc)
		<x-admin-fields::description>{{ $desc }}</x-admin-fields::description>
	@endisset

	@error($id)
		<x-admin-fields::error>{{ $message }}</x-admin-fields::error>
	@enderror
</div>