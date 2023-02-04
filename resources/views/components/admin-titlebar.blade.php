@props([
	'icon' => '',
	'title' => '',
	'subtext' => '',
])

<div class="px-8 py-9 z-20 bg-white shadow-sm border-b">
	<div class="flex items-center justify-between gap-6">
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

	<x-forms::notifications :errors="$errors" bag="default" class="px-8" />
</div>