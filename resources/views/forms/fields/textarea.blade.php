@props(['class', 'id', 'placeholder', 'label', 'desc', 'value', 'required', 'max', 'disabled', 'rows' => 6])



<div class="{{ $class }}">
	<div class="mb-2">
		<label for="{{ $id }}" class="block font-bold @error($id) text-accent-alert @enderror">{{ $label }} @isset($required)<span class="text-red-700 font-black">*</span>@endisset</label>

		@isset($desc)
		<span class="text-sm italic">{{ $desc }}</span>
		@endisset
	</div>

	@error($id)
	<span class="text-sm italic font-semibold text-accent-alert">{{ $message }}</span>
	@enderror

	<textarea rows="{{ $rows }}" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $placeholder }}" class="w-full @error($id) border-accent-alert @enderror" rows="10" @isset ($max)data-max="{{ $max }}" data-counter="{{ $id }}-counter" @endisset @isset($disabled) disabled @endisset>{{ $value ?? '' }}</textarea>
	@isset($max)
	<div class="flex flex-row justify-end mt-2">
		<span id="{{ $id }}-counter" class="text-xs text-body-50 italic font-semibold">0/{{ $max }}</span>
	</div>
	@endisset
</div>