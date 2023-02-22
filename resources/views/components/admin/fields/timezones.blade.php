@props([
	'class' => 'col-span-full',
	'id',
	'name',
	'label',
	'value' => '',
	'placeholder' => 'Select one...',
	'desc',
	'required' => '',
	'disabled',
	'tabindex' => '0',
	])

<div class="flex flex-col gap-2 {{ $class }}">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	<select
		type="text"
		id="{{ $id }}"
		name="{{ $name ?? $id }}"
		tabindex="{{ $tabindex }}"
		@isset($disabled) disabled @endisset
		class="text-base disabled:opacity-50 @error($id) border-error @enderror"
	>
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder }}</option>

		@foreach ($timezones as $oval => $olabel)
			<option value="{{ $oval }}" @if($oval == $value) selected @endif>
				{{ $olabel }}
			</option>
		@endforeach
	</select>

	@isset($desc)
		<x-afields::description>{{ $desc }}</x-afields::description>
	@endisset

	@error($id)
		<x-afields::error>{{ $message }}</x-afields::error>
	@enderror
</div>