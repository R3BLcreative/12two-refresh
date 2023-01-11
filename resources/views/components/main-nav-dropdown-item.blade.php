@props([
	'href' => '', // URL for external links
	'route' => '', // Route name for internal links
	'class' => '', // Additional classes/overrides
	'text' => '', // Link text
])

@php
$classes = [
'default' => 'text-body-800 font-serif font-medium whitespace-nowrap text-base tracking-wide transition-all ease-in-out group-hover/item:text-primary-300 group-active/item:text-primary-700',
'active' => 'text-primary-500 font-serif font-semibold whitespace-nowrap text-base tracking-wide transition-all ease-in-out group-hover/item:text-primary-300 group-active/item:text-primary-700',
];

if(Route::currentRouteName() == $route) {
$class = $classes['active'] . ' ' . $class;
}else{
$class = $classes['default'] . ' ' . $class;
}
@endphp

<li class="px-4 py-2 group/item border-b border-surface-200 last:border-b-0 transition-all ease-in-out hover:bg-surface-100">
	<a href="{{ ($route) ? route($route) : $href }}" class="{{ $class }}">
		{{ $text }}
	</a>
</li>