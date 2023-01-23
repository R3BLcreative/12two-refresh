@props([
	'class' => '', // Wrapper class decs
	'id', // Field ID
	'placeholder', // Field placeholder text or default ID
	'label' => '', // Field label text
	'desc', // Field description text
	'value', // Field init value
	'required', // Set field as required
	'options', // Select field options
	'bag', // Error bag name
])

<div class="{{ $class }} text-body-700">
	<label for="{{ $id }}" class="block mb-2 font-bold @empty($label) !hidden @endempty @error($id, $bag) text-error-100 @enderror">{{ $label }} @isset($required)<span class="text-red-700 font-black">*</span>@endisset</label>

	<select id="{{ $id }}" name="{{ $id }}" class="w-full @error($id, $bag) border-error-100 @enderror">
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder }}</option>
		@foreach ($options as $optval => $option)
		@if(is_array($option))
		<optgroup label="{{ $optval }}">
			@foreach ($option as $oval => $opt)
			<option value="{{ $oval }}" @if($value==$opt) selected @endif>{{ $opt }}</option>
			@endforeach
		</optgroup>
		@else
		<option value="{{ $optval }}" @if($value==$option) selected @endif>{{ $option }}</option>
		@endif
		@endforeach
	</select>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset

	@error($id, $bag)
	<span class="text-sm italic font-semibold text-error-100">{{ $message }}</span>
	@enderror
</div>