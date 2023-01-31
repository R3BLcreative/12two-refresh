@props([
	'atts' => [],
])

<li class="group py-3 px-4 rounded-md hover:bg-surface-white-200">
	@php
		if($atts->route == $atts->slug) {
			$params = [];
		}else{
			$params = ['slug' => $atts->slug];
		}
	@endphp
	<a href="{{ route('admin.' . $atts->route, $params) }}" class="flex flex-auto items-center gap-4 group-hover:text-white font-semibold transition-all ease-in-out">
		<i class="fa-duotone {{ $atts->icon }} text-xl transition-all ease-in-out"></i>

		{!! $atts->plural !!}
	</a>
</li>