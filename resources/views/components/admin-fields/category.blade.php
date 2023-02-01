@props([
	'class',
	'id',
	'label',
	'value' => '',
	'placeholder',
	'desc',
	])

@php
	$cats = App\Models\Category::where('type', 'content-type')->get();
@endphp

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-admin-fields::label :id="$id">{!! $label !!}</x-admin-fields::label>
	@endisset

	<select type="text" id="{{ $id }}" name="{{ $id }}" class="">
		<option value="" disabled @empty($value) selected @endempty>{{ $placeholder ?? 'Please select one' }}</option>
		@foreach ($cats as $cat)
			<option value="{{ $cat->id }}" @if($cat->id == $value) selected @endif>
				{{ $cat->plural }}
			</option>
		@endforeach
	</select>

	@isset($desc)
		<div class="">{!! $desc !!}</div>
	@endisset
</div>