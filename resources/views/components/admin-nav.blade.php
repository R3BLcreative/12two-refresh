@props([
	'atts' => [
		'heading' => [
			'title' => '',
			'subtext' => '',
		],
		'items' => [
			[
				'icon' => '',
				'plural' => '',
				'slug' => '',
			],
		],
	]
])

<div class="flex flex-col gap-4">
	<x-components::admin-heading tag="h2" style="nav" subtext="{{ $atts['heading']['subtext'] }}" class="px-4">
		{{ $atts['heading']['title'] }}
	</x-components::admin-heading>

	<ul class="flex flex-col flex-auto gap-2">
		@foreach ($atts['items'] as $item)
			<x-components::admin-nav-item :atts="$item" />
		@endforeach
	</ul>
</div>