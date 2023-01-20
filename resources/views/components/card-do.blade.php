@props([
	'image',
	'alt',
	'title',
	'text',
	'href',
])
<a href="{{ $href }}" aria-label="Learn more about {{ $title }}" class="mobile:col-span-full tablet:col-span-4 laptop:col-span-3 flex flex-col gap-4 justify-start items-center rounded-md shadow-md bottom-0 relative transition-all ease-in-out hover:shadow-xl hover:bottom-2 pb-6 group/card bg-white">
	<x-components::image image="{{ $image }}" alt="{{ $alt }}" class="rounded-t-md saturate-100 group-hover/card:saturate-0" />

	<div class="flex flex-col gap-4 grow px-3">
		<x-components::heading tag="h3" style="h3" class="text-center transition-all ease-in-out !text-body-700 !mb-0 !text-2xl !drop-shadow-none group-odd/section:group-hover/card:!text-secondary-accent-400 group-even/section:group-hover/card:!text-primary-accent-400">
			{{ $title }}
		</x-components::heading>
	</div>
</a>