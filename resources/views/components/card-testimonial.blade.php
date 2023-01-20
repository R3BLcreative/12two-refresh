@props([
	'id',
	'content',
])

@php
	$iconc = 'opacity-30 text-2xl relative z-10 -top-1 group-odd/section:text-secondary-accent-500 group-even/section:text-primary-accent-500';
@endphp

<div id="{{ $id }}" class="swiper-slide bg-white rounded-md border border-surface-100 !h-auto flex flex-col justify-between items-center py-4 gap-4 my-4 shadow-md">
	<div class="flex items-start justify-center gap-0 relative px-4">
		<i class="fa-sharp fa-solid fa-quote-left left-2 {{ $iconc }}"></i>
		<span class="text-body-700 font-bold italic leading-normal relative z-20 text-center">
			{{ $content['quote'] }}
		</span>
		<i class="fa-sharp fa-solid fa-quote-right right-3 {{ $iconc }}"></i>
	</div>

	<div class="flex flex-col items-center justify-center gap-1 px-4">
		<span class="font-medium group-odd/section:text-secondary-800 group-even/section:text-primary-600 uppercase">
			&ndash; {{ $content['author'] }} &ndash;
		</span>
		<span class="text-body-600 text-sm uppercase">{{ $content['trip'] ?? '' }}</span>
	</div>
</div>