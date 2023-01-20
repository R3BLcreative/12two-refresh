@props([
	'image',
	'alt',
])

<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4 flex flex-col items-center gap-5">
	<x-components::image :image="$image" :alt="$alt" loading="lazy" class="rounded-md shadow-md" />
	<p class="text-center font-semibold">{{ $slot }}</p>
</div>