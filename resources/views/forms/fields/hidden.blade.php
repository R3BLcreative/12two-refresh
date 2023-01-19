@props([
	'id', // Field ID
	'value', // Field value
	'bag', // Error bag name
])

<input type="hidden" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}">