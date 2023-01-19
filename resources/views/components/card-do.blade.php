@props([
	'image',
	'alt',
	'title',
	'text',
	'href',
])

<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-3 flex flex-col gap-4 justify-start items-center border-surface-100 border rounded-md shadow-md pb-6">
	<x-components::image image="{{ $image }}" alt="{{ $alt }}" class="w-full h-auto rounded-t-md" />

	<div class="flex flex-col gap-4 grow px-3">
		<x-components::heading tag="h3" style="h3" class="text-center !mb-0 !text-2xl !drop-shadow-none">
			{{ $title }}
		</x-components::heading>

		<p class="text-center !mb-0 line-clamp-4">{!! $text !!}</p>
	</div>

	<x-components::button tag="a" style="primary" size="small" href="{{ $href }}" class="justify-self-end" icon="fa-duotone fa-arrow-right fa-xl">
		Learn More
	</x-components::button>
</div>