@props([
	'icon',
	'title',
	'subtext',
])

<div class="px-8 z-20 bg-surface-light flex flex-col">
	<div class="flex items-center justify-between gap-6 min-h-[121px]">
		<div class="flex items-center gap-4">
			<i class="fa-duotone {{ $icon }} text-7xl"></i>
			<x-acomponents::heading tag="h1" style="h2" :subtext="$subtext">
				{!! $title !!}
			</x-acomponents::heading>
		</div>

		<div class="flex items-center gap-4">
			{{ $slot }}
		</div>
	</div>

	<x-forms::notifications :errors="$errors" bag="default" class="px-8" />
</div>