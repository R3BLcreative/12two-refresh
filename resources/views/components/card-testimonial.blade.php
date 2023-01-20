@props([
	'id',
	'content',
])

@php
	$iconc = 'opacity-30 text-2xl relative z-10 -top-1 text-body-500';
@endphp

<div id="{{ $id }}" class="swiper-slide bg-white rounded-md border border-surface-100 !h-auto flex flex-col justify-between items-center">
	<div class="flex items-start justify-center gap-0 relative p-6">
		<i class="fa-sharp fa-solid fa-quote-left left-2 {{ $iconc }}"></i>
		<span class="text-body-700 text-lg font-semibold leading-snug italic drop-shadow relative z-20 text-center">
			{{ $content['quote'] }}
		</span>
		<i class="fa-sharp fa-solid fa-quote-right right-3 {{ $iconc }}"></i>
	</div>

	<div class="flex flex-col items-center justify-center gap-2 p-6">
		<span class="font-medium">
			&ndash; {{ $content['author'] }} &ndash;
		</span>
		<span class="text-body-600 text-sm">{{ $content['trip'] ?? '' }}</span>
	</div>
</div>