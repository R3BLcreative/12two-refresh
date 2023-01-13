@props([
	'id', // Field ID
	'value' // Field value
])

<input type="hidden" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}">