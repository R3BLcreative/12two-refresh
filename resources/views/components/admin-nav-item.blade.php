@props([
	'atts' => [],
])

@php
	$active = (request()->segment(2) == $atts->slug) ? true : false;
@endphp

<li class="group py-3 px-4 rounded-md transition-all ease-in-out @if($active) bg-surface-white-200 hover:bg-surface-white-300 @else hover:bg-surface-white-200 @endif">
	@php
		if($atts->route == $atts->slug) {
			$params = [];
		}else{
			$params = ['slug' => $atts->slug];
		}
	@endphp
	<a href="{{ route('admin.' . $atts->route, $params) }}" class="flex flex-auto items-center gap-4 font-semibold transition-all ease-in-out @if($active) text-white @else group-hover:text-white @endif">
		<i class="fa-duotone {{ $atts->icon }} text-xl transition-all ease-in-out"></i>

		{!! $atts->plural !!}
	</a>
</li>