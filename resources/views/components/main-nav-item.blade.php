@props([
'href' => '',// URL for external links
'route' => '',// Route name for internal links
'class' => '',// Additional classes/overrides
'text' => '',// Link text
])

@php
$classes = [
'default' => 'text-body-800 font-serif font-semibold mobile:text-lg laptop:text-xl uppercase tracking-widest transition-all ease-in-out hover:text-primary-300 active:text-primary-700',
'active' => 'text-primary-500 font-serif font-semibold mobile:text-lg laptop:text-xl uppercase tracking-widest transition-all ease-in-out hover:text-primary-500 active:text-primary-700',
];

if(request()->segment(1) == $route) {
$class = $classes['active'] . ' ' . $class;
}else{
$class = $classes['default'] . ' ' . $class;
}
@endphp

<a href="{{ ($route) ? route($route) : $href }}" class="{{ $class }}">{{ $text }}</a>