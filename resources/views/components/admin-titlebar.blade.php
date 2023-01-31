@props([
	'icon' => '',
	'subtext' => ''
])

<div class="flex items-center gap-4 px-8 py-9">
	<i class="fa-duotone {{ $icon }} text-7xl"></i>
	<x-components::admin-heading tag="h1" style="h2" :subtext="$subtext">
	{{ $slot }}
	</x-components::admin-heading>
</div>