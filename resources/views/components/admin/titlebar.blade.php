@props([
	'icon',
	'title',
	'subtext',
])

@php
	// Check icon for fa-brands - insert fa-duotone if not present
	if(!preg_match('/fa-brands/', $icon)) $icon = 'fa-duotone '.$icon;
@endphp

<div class="flex items-center justify-between gap-6 min-h-[121px]">
	<div class="flex items-center gap-4">
		<i class="{{ $icon }} text-7xl"></i>
		<x-acomponents::heading tag="h1" style="h2" :subtext="$subtext">
			{!! $title !!}
		</x-acomponents::heading>
	</div>

	<div class="flex items-center gap-4">
		{{ $slot }}
	</div>
</div>

<x-forms::notifications :errors="$errors" bag="default" class="px-8" />