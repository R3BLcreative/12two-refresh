@props([
'class' => '', // Wrapper class decs
'id', // Field ID
'label', // Field label text
'desc', // Field description text
'options', // Checkbox options
'required', // Set field as required
'cols' => 1, // Break checkboxes into columns
'details', // Show details box flag
'detailsMax', // Char count for details box
'showDetails' => false,
'bag', // Error bag name
])

<div class="{{ $class }} text-body-700 flex flex-col gap-4" @isset($details) data-hasDeps="1" @endisset>
	<div class="">
		@isset($label)
			<label for="{{ $id }}" class="block font-bold @error($id, $bag) text-error @enderror">{{ $label }} @isset($required)<span class="text-primary font-black">*</span>@endisset</label>
		@endisset

		@isset($desc)
		<span class="text-sm italic">{{ $desc }}</span>
		@endisset

		@error($id, $bag)
		<span class="text-sm italic font-semibold text-error">{{ $message }}</span>
		@enderror
	</div>

	@php
	$i = 1;
	$grid = [
	'grid grid-cols-1',
	'grid grid-cols-1',
	'grid grid-cols-2',
	'grid mobile:grid-cols-1 tablet:grid-cols-3',
	'grid mobile:grid-cols-1 laptop:grid-cols-4'
	];
	@endphp
	<div class="{{ $grid[$cols] ?? 'grid grid-cols-1' }} gap-4 items-start">
		@foreach($options as $optval => $option)
		<div class="flex flex-row items-center justify-start gap-4">
			<input type="checkbox" value="{{ $optval }}" id="{{ $id }}_{{ $i }}" name="{{ $id }}_{{ $i }}" class="cursor-pointer" @isset($details) @if(old($id.'_'.$i))aria-expanded="true" @else aria-expanded="false" @endif aria-controls="{{ $id }}-details-wrap" data-deps="" @endisset @if(old($id.'_'.$i))checked="checked" @endif>
			<label for="{{ $id }}_{{ $i }}" class="cursor-pointer text-sm leading-snug @error($id.'-'.$i, $bag) text-error @enderror">{{ $option }}</label>
			@php
			if(old($id.'_'.$i)) {
			$showDetails = true;
			}
			@endphp
		</div>
		@php
		$i++;
		@endphp
		@endforeach
	</div>

	@isset($details)
	<div id="{{ $id }}-details-wrap" class="flex flex-col gap-4 w-full @if($showDetails) max-h-[500px] opacity-1 @else max-h-0 opacity-0 @endif transition-all ease-in-out duration-500 overflow-hidden" @if(old($id.'_'.$i))aria-expanded="true" @else aria-expanded="false" @endif>
		<div class="">
			<label for="{{ $id }}-details" class="block font-bold @error($id.'-details', $bag) text-error @enderror">Explanation <span class="text-primary font-black">*</span></label>

			<span class="text-sm italic">
				Please explain your selections above.
			</span>

			@error($id.'-details', $bag)
			<span class="text-sm italic font-semibold text-error">{{ $message }}</span>
			@enderror
		</div>
		<textarea id="{{ $id }}-details" name="{{ $id }}-details" placeholder="Explain here..." class="w-full @error($id.'-details', $bag) border-error @enderror" rows="4" @isset ($detailsMax)data-max="{{ $detailsMax }}" data-counter="{{ $id }}-details-counter" @endisset>{{ old($id.'-details') }}</textarea>
		@isset($detailsMax)
		<div class="flex flex-row justify-end">
			<span id="{{ $id }}-details-counter" class="text-xs text-body-50 italic font-semibold">0/{{ $detailsMax }}</span>
		</div>
		@endisset
	</div>
	@endisset
</div>