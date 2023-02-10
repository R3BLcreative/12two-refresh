@props([
	'class' => '',
	'id',
	'label',
	'value' => '',
	'placeholder' => 'Select one...',
	'desc' => '',
	'required' => '',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	<select type="text" id="{{ $id }}" name="{{ $id }}" class="text-base @error($id) border-error @enderror">
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder ?? 'Please select one' }}</option>
		@foreach ($roles as $role)
			<option value="{{ $role->name }}" @if($role->name == $value) selected @endif>
				{{ Str::title($role->name) }}
			</option>
		@endforeach
	</select>

	@isset($desc)
		<x-afields::description>{{ $desc }}</x-afields::description>
	@endisset

	@error($id)
		<x-afields::error>{{ $message }}</x-afields::error>
	@enderror
</div>