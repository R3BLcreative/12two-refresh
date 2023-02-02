@props(['errors','bag'])

@php
	if(request()->segment(1) == 'admin') {
		$txtSize = 'text-lg';
	}else{
		$txtSize = 'text-sm';
	}
@endphp

@if ($errors->$bag->any())
<div class="w-full rounded-lg mb-6 bg-white border-2 border-error p-3 leading-normal">
	<p class="font-semibold !mb-0 text-error-dark {{ $txtSize }}">There are errors with your submission. Please check the highlighted fields below.</p>
</div>
@endif

@if (session()->has('message'))
<div
	class="w-full rounded-lg mb-6 bg-white border-2 border-success p-3 leading-normal">
	<p class="font-semibold !mb-0 text-success-dark {{ $txtSize }}">
		{{ session()->get('message') }}
	</p>
</div>
@endif