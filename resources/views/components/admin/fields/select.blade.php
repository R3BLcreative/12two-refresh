@props([
	'class' => 'col-span-full',
	'id',
	'label',
	'value' => '',
	'placeholder' => 'Select one...',
	'desc',
	'required' => '',
	'options',
	])

<div class="flex flex-col gap-2 {{ $class }}">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	<select type="text" id="{{ $id }}" name="{{ $id }}" class="text-base @error($id) border-error @enderror">
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder }}</option>

		@foreach ($options as $oval => $olabel)
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