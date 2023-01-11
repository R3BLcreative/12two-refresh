@props([
	'href' => '', // URL for external links
	'route' => '', // Route name for internal links
	'class' => '', // Additional classes/overrides
	'text' => '', // Link text
	'items' => [], // Dropdown items
])

@php
$classes = [
'default' => 'text-body-800 font-serif font-semibold mobile:text-xl mobile:pl-5 mobile:border-l-8 mobile:border-l-primary-500 tablet:text-2xl laptop:pl-0 laptop:border-0 laptop:text-xl uppercase tracking-widest transition-all ease-in-out hover:text-primary-300 active:text-primary-700',
'active' => 'text-primary-500 font-serif font-semibold mobile:text-xl mobile:pl-5 mobile:border-l-8 mobile:border-l-primary-500 tablet:text-2xl laptop:pl-0 laptop:border-0 laptop:text-xl uppercase tracking-widest transition-all ease-in-out hover:text-primary-500 active:text-primary-700',
];

if(request()->segment(1) == $route) {
$class = $classes['active'] . ' ' . $class;
}else{
$class = $classes['default'] . ' ' . $class;
}
@endphp

<li class="relative group">
	<a href="{{ ($route) ? route($route) : $href }}" class="laptop:py-4 {{ $class }}">
		{{ $text }}
	</a>

	@if($items)
	<x-components::main-nav-dropdown :items="$items" />
	@endif
</li>