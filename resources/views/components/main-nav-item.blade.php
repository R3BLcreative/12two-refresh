@props([
'href' => '',// URL for external links
'route' => '',// Route name for internal links
'class' => '',// Additional classes/overrides
'text' => '',// Link text
])

@php
$classes = [
'default' => 'text-primary-300 font-sans font-semibold mobile:text-lg laptop:text-[.9rem] uppercase tracking-widest transition-all ease-in-out hover:text-primary-100',
'active' => 'text-primary-100 font-sans font-semibold mobile:text-lg laptop:text-[.9rem] uppercase tracking-widest transition-all ease-in-out hover:text-primary-200',
];

if(request()->segment(1) == $route) {
$class = $classes['active'] . ' ' . $class;
}else{
$class = $classes['default'] . ' ' . $class;
}
@endphp

<a href="{{ ($route) ? route($route) : $href }}" class="{{ $class }}">{{ $text }}</a>