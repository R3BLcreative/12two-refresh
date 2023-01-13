@props([
	'class', // Wrapper class decs
	'id', // Field ID
	'type', // Input type
	'placeholder', // Field placeholder text or default ID
	'label', // Field label text
	'desc', // Field description text
	'value', // Field init value
	'required', // Set field as required
	'slots', // Input masking slot defs
	'accepts' // Input masking type casting
])

<div @isset($class)class="{{ $class }}" @endisset>
	<label for="{{ $id }}" class="block mb-2 font-bold @empty($label) invisible @endempty @error($id) text-alert-100 @enderror">{{ $label ?? $desc }} @isset($required)<span class="text-red-700 font-black">*</span>@endisset</label>

	<input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" @isset($placeholder)placeholder="{{ $placeholder }}" @endisset value="{{ $value ?? '' }}" class="w-full @error($id) border-alert-100 @enderror" @isset($slots)data-slots="{{ $slots }}" @endisset @isset($accepts)data-accepts="{{ $accepts }}" @endisset>

	@isset($desc)
	<span class="text-sm italic">{{ $desc }}</span>
	@endisset

	@error($id)
	<span class="text-sm italic font-semibold text-alert-100">{{ $message }}</span>
	@enderror
</div>