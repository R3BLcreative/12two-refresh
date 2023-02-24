<div id="{{ $id }}-wrapper" class="flex flex-col gap-2 {{ $class }}">
	@if(!empty($label))
		<x-afields::label :$id :$required>{!! $label !!}</x-afields::label>
	@endif

	<select
		id="{{ $id }}"
		name="{{ $name ?? $id }}"
		tabindex="{{ $tabindex }}"
		@if($disabled === true) disabled @endif
		class="text-base disabled:opacity-50 @error($id) border-error @enderror">

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

	@if(!empty($desc))
		<x-afields::description>{!! $desc !!}</x-afields::description>
	@endif

	@error($id)
		<x-afields::error>{!! $message !!}</x-afields::error>
	@enderror
</div>