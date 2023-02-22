@props([
	'class' => 'col-span-full',
	'id',
	'label',
	'values' => NULL,
	'desc',
	'required' => '',
	'options',
	'cols' => 'columns-2',
	'disabled',
	'tabindex' => '0',
	])

<div class="flex flex-col gap-2 {{ $class }}">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	@isset($desc)
		<x-afields::description>{{ $desc }}</x-afields::description>
	@endisset

	<ul class="{{ $cols }}">
		@foreach($options as $cid => $clabel)
			<li class="flex items-center gap-3 px-4 py-2 @if($disabled) opacity-50 @endif">
				<input
					type="checkbox"
					id="{{ $id }}_{{ $cid }}"
					name="{{ $id }}[{{ $cid }}]"
					tabindex="{{ $tabindex }}"
					value="1"
					@isset($disabled) disabled @endisset
					class=""
					@isset($values[$cid]) checked @endisset />
				<label for="{{ $id }}_{{ $cid }}" class="font-semibold">{!! $clabel !!}</label>
			</li>
		@endforeach
	</ul>

	@error($id)
		<x-afields::error>{{ $message }}</x-afields::error>
	@enderror
</div>