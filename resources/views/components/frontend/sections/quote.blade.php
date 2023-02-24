@props([
	'author' => '',
	'class' => '', // Section class decs
])

@php
	$iconc = 'opacity-30 text-5xl relative z-10 -top-3 group-odd/section:text-secondary-accent-300 group-even/section:text-body-500';
@endphp

<x-sections::section class="{{ $class }}">
	<row>
		<div class="col-span-full flex flex-col items-center justify-center gap-4">
			<div class="flex items-start justify-center gap-0 relative">
				<i class="fa-sharp fa-solid fa-quote-left left-2 {{ $iconc }}"></i>
				<span class="group-odd/section:text-secondary-500 group-even/section:text-primary-500 text-4xl font-semibold italic drop-shadow relative z-20 text-center">
					{{ $slot }}
				</span>
				<i class="fa-sharp fa-solid fa-quote-right right-3 {{ $iconc }}"></i>
			</div>
			<span class="group-odd/section:text-body-200 group-even/section:text-body-600 text-2xl font-medium">
				&ndash; {{ $author }} &ndash;
			</span>
		</div>
	</row>
</x-sections::section>