@props(['errors','bag'])

@php
	if(request()->segment(1) == 'admin') {
		$txtSize = 'text-lg';
	}else{
		$txtSize = 'text-sm';
	}
@endphp

@if ($errors->$bag->any())
	<x-forms::errors>
		There are errors with your submission. Please check the highlighted fields below.
	</x-forms::errors>
@endif

@if (session()->has('message'))
	<x-forms::messages />
@endif