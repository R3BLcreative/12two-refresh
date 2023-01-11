@props([
	'route' => '',
	'text' => '',
])

@php
$classes = [
	'default' => 'text-base hover:opacity-80 hover:underline active:opacity-100',
	'active' => 'text-base font-semibold underline hover:opacity-80 hover:no-underline active:opacity-100',
];

if(Route::currentRouteName() == $route) {
	$class = $classes['active'];
}else{
	$class = $classes['default'];
}
@endphp

<li><span class="fa-li"><i class="fa-regular fa-l"></i></span><a href="{{ route($route) }}" class="{{ $class }}">{{ $text }}</a></li>