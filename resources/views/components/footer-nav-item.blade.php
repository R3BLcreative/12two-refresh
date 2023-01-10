@props([
	'route' => '',
	'text' => '',
])

<li><span class="fa-li"><i class="fa-regular fa-l"></i></span><a href="{{ route($route) }}" class="text-base hover:opacity-80 hover:underline active:opacity-100">{{ $text }}</a></li>