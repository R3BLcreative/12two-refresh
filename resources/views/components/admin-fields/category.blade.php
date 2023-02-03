@props([
	'class',
	'id',
	'label',
	'value' => '',
	'placeholder',
	'desc',
	'required',
	'catType',
	])

@php
	$cats = App\Models\Category::where('type', $catType)->get();
@endphp

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-admin-fields::label :id="$id" :required="$required">{!! $label !!}</x-admin-fields::label>
	@endisset

	<select type="text" id="{{ $id }}" name="{{ $id }}" class="text-base @error($id) border-error @enderror">
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder ?? 'Please select one' }}</option>
		@foreach ($cats as $cat)
			<option value="{{ $cat->id }}" @if($cat->id == $value) selected @endif>
				{{ ($cat->force_single) ? $cat->label : Str::plural($cat->label) }}
			</option>
		@endforeach
	</select>

	@isset($desc)
		<x-admin-fields::description>{{ $desc }}</x-admin-fields::description>
	@endisset

	@error($id)
		<x-admin-fields::error>{{ $message }}</x-admin-fields::error>
	@enderror
</div>