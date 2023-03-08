<div id="{{ $id }}-wrapper" class="flex flex-col gap-2 {{ $class }}">
	@if(!empty($label))
		<x-afields::label :$id :$required>{!! $label !!}</x-afields::label>
	@endif

	<textarea
		id="{{ $id }}"
		name="{{ $name ?? $id }}"
		tabindex="{{ $tabindex }}"
		rows="{{ $options['rows'] ?? 5 }}"
		placeholder="{{ $placeholder}}"
		@if($disabled === true) disabled @endif
		class="text-base w-full disabled:opacity-50 @error($id) border-error @enderror">{{ $value }}</textarea>

	@if(!empty($desc))
		<x-afields::description>{!! $desc !!}</x-afields::description>
	@endif
</div>