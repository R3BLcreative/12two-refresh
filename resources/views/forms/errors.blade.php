@props(['class'])

@php
	if(request()->segment(1) == 'admin') {
		$txtSize = 'text-lg';
	}else{
		$txtSize = 'text-sm';
	}
@endphp

<div class="animate-fade-out" style="animation-delay:8s;">
	<div class="w-full rounded-lg mb-6 bg-white border-2 border-error p-3 leading-normal {{ $class ?? '' }}">
		<p class="font-semibold !mb-0 text-error-dark {{ $txtSize }}">{{ $slot }}</p>
	</div>
</div>