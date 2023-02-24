<div id="{{ $id }}-wrapper" class="flex flex-col gap-2 {{ $class }}">
	@if(!empty($label))
		<x-afields::label :$id :$required>{!! $label !!}</x-afields::label>
	@endif

	@if(!empty($desc))
		<x-afields::description>{!! $desc !!}</x-afields::description>
	@endisset

	<ul class="{{ $cols }}">
		@foreach($options as $cid => $clabel)
			<li class="flex items-center gap-3 px-4 py-2 @if($disabled === true) opacity-50 @endif">
				<input
					type="checkbox"
					id="{{ $id }}_{{ $cid }}"
					name="{{ $id }}[{{ $cid }}]"
					tabindex="{{ $tabindex }}"
					value="{{ $cid }}"
					@if($disabled === true) disabled @endif
					class=""
					@isset($value[$cid]) checked @endisset />
				<label for="{{ $id }}_{{ $cid }}" class="font-semibold">{!! $clabel !!}</label>
			</li>
		@endforeach
	</ul>

	@error($id)
		<x-afields::error>{!! $message !!}</x-afields::error>
	@enderror
</div>