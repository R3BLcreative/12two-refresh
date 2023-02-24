<div id="{{ $id }}-wrapper" class="flex flex-col gap-2 {{ $class }}">
	@if(!empty($label))
		<x-afields::label :$id :$required>{!! $label !!}</x-afields::label>
	@endif

	<input
		type="{{ $type }}"
		id="{{ $id }}"
		name="{{ $name ?? $id }}"
		tabindex="{{ $tabindex }}"
		value="{{ $value }}"
		placeholder="{{ $placeholder }}"
		@if($disabled === true) disabled @endif
		class="text-base disabled:opacity-50 @error($id) border-error @enderror"
	/>

	@if(!empty($desc))
		<x-afields::description>{!! $desc !!}</x-afields::description>
	@endif

	@error($id)
		<x-afields::error>{!! $message !!}</x-afields::error>
	@enderror
</div>