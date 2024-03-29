@props([
	'class' => '', // Wrapper class decs
	'id', // Field ID
	'type', // Input type
	'placeholder', // Field placeholder text or default ID
	'label' => '', // Field label text
	'desc', // Field description text
	'value', // Field init value
	'required', // Set field as required
	'max', // Max chars allowed
	'disabled', // Disable editing the textarea
	'rows' => 6, // Textarea rows
	'bag' => 'default', // Error bag name
])



<div class="{{ $class }} text-body-700">
	<div class="mb-2">
		<label for="{{ $id }}" class="block font-bold @empty($label) !hidden @endempty @error($id, $bag) text-error @enderror">{{ $label }} @isset($required)<span class="text-primary font-black">*</span>@endisset</label>

		@isset($desc)
		<span class="text-sm italic">{{ $desc }}</span>
		@endisset
	</div>

	@error($id)
	<span class="text-sm italic font-semibold text-error">{{ $message }}</span>
	@enderror

	<textarea rows="{{ $rows }}" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" class="w-full rounded-md @error($id, $bag) border-error @enderror" rows="10" @isset ($max)data-max="{{ $max }}" data-counter="{{ $id }}-counter" @endisset @isset($disabled) disabled @endisset>{{ $value ?? '' }}</textarea>
	@isset($max)
	<div class="flex flex-row justify-end mt-2">
		<span id="{{ $id }}-counter" class="text-xs text-body-50 italic font-semibold">0/{{ $max }}</span>
	</div>
	@endisset
</div>