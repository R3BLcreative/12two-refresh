@props([
'id',
'image',
'alt',
'class' => 'w-full h-auto',
])

<div role="img" aria-label="{{ $alt ?? '' }}" id="{{ $id ?? '' }}" class="{{ $class }}">
	@php
		echo file_get_contents(asset('images/'.$image));
	@endphp
</div>