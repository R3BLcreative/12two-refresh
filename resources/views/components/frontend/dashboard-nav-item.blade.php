@props([
	'route'
])

@php
$classes = [
'default' => '',
'active' => 'text-primary-500 bg-surface-50',
];

if(Route::currentRouteName() == $route) {
$class = $classes['active'];
}else{
$class = $classes['default'];
}
@endphp

<li class="w-full">
	<a href="{{ route($route) }}" class="block w-full uppercase font-semibold tracking-widest hover:bg-secondary-500 hover:text-body-700 px-3 py-2 transition-all ease-in-out {{ $class }}">
		{{ $slot }}
	</a>
</li>