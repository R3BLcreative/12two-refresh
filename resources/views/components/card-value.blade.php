@props([
	'icon',
	'title',
])

<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 flex flex-col items-center gap-5">
	<i class="{{ $icon }} text-7xl text-secondary-200"></i>
	<x-components::heading tag="h3" style="h3" class="text-center">{{ $title }}</x-components::heading>
	<p class="text-center font-semibold">{{ $slot }}</p>
</div>