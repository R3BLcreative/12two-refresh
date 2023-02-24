@props([
	'id', // Field ID
	'value', // Field value
	'bag' => 'default', // Error bag name
])

<input type="hidden" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}">