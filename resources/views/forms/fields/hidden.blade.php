@props(['id', 'value'])

<input type="hidden" id="{{ $id }}" name="{{ $id }}" value="{{ $value ?? '' }}">