@props([
	'class' => 'col-span-full',
	'id',
	'name',
	'label',
	'value' => '',
	'placeholder' => 'Select one...',
	'desc',
	'required' => '',
	'options',
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

		@foreach ($options as $oval => $olabel)

			@if(is_array($olabel))
				<optgroup label="{{ $oval }}">
					@foreach ($olabel as $v => $l)
						<option value="{{ $v }}" @if($v == $value) selected @endif>
							{{ $l }}
						</option>
					@endforeach
				</optgroup>
			@else
				<option value="{{ $oval }}" @if($oval == $value) selected @endif>
					{{ $olabel }}
				</option>
			@endif
		@endforeach
	</select>

	@isset($desc)
		<x-afields::description>{{ $desc }}</x-afields::description>
	@endisset

	@error($id)
		<x-afields::error>{{ $message }}</x-afields::error>
	@enderror
</div>