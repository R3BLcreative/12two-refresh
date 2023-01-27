@props([
	'atts' => [
		'icon' => '',
		'plural' => '',
		'slug' => '',
	],
])

<li class="group py-3 px-4 rounded-md hover:bg-surface-white-200">
	<a href="{{ route('admin.'.$atts['slug']) }}" class="flex flex-auto items-center gap-4 group-hover:text-white font-semibold transition-all ease-in-out">
		<i class="fa-duotone {{ $atts['icon'] }} text-xl transition-all ease-in-out"></i>

		{!! $atts['plural'] !!}
	</a>
</li>