@props([
	'icon' => '',
	'title' => '',
	'subtext' => '',
])

<div class="flex items-center justify-between gap-6 px-8 py-9">
	<div class="flex items-center gap-4">
		<i class="fa-duotone {{ $icon }} text-7xl"></i>
		<x-components::admin-heading tag="h1" style="h2" :subtext="$subtext">
			{!! $title !!}
		</x-components::admin-heading>
	</div>

	<div class="flex items-center gap-4">
		{{ $slot }}
	</div>
</div>