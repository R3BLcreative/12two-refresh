@props([
'class' => '', // Wrapper class decs
'id', // Field ID
'label', // Field label text
'value', // Checkbox value
'required', // Set field as required
'bag' => 'default', // Error bag name
])

<div class="{{ $class }} text-body-700 flex flex-col gap-4">
	<div class="grid grid-cols-1 gap-4 items-start">
		<div class="flex flex-row items-center justify-start gap-4">
			<input type="checkbox" value="{{ $value }}" id="{{ $id }}" name="{{ $id }}" class="cursor-pointer" @if(old($id))checked="checked" @endif>
			<label for="{{ $id }}" class="cursor-pointer font-bold @error($id, $bag) text-error @enderror">{{ $label }}</label>
		</div>

		@error($id, $bag)
		<span class="text-sm italic font-semibold text-error">{{ $message }}</span>
		@enderror
	</div>
</div>