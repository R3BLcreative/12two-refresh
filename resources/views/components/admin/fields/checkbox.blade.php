@props([
	'id',
	'label',
	'values' => NULL,
	'desc' => '',
	'required' => '',
	'options',
	'cols' => 'columns-2',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	@isset($desc)
		<x-afields::description>{{ $desc }}</x-afields::description>
	@endisset

	<ul class="{{ $cols }}">
		@foreach($options as $cid => $clabel)
			<li class="flex items-center gap-3 px-4 py-2">
				<input
					type="checkbox"
					id="{{ $id }}_{{ $cid }}"
					name="{{ $id }}[{{ $cid }}]"
					value="1"
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