@props([
'id' => '',// Element ID attribute
'tag' => 'h1',// h1, h2, h3, h4, h5, h6, span
'style' => 'h1',// h1, h2, h3, h4, h5, h6, nav, badges, tableheader
'text' => 'Default Text',// The actual heading text
'class' => '',// Additional class atts/overrides
])

@php
$classes = [
	'none' => '',
	'h1' => 'mb-3 group-even/section:text-primary-500 group-odd/section:text-secondary-500 font-heading font-bold uppercase tracking-wider leading-loose mobile:text-5xl laptop:text-6xl',
	'h2' => 'mb-3 group-even/section:text-primary-500 group-odd/section:text-secondary-500 font-heading font-semibold uppercase tracking-wider leading-loose mobile:text-4xl laptop:text-5xl',
	'h3' => 'mb-3 group-even/section:text-primary-accent-200 group-odd/section:text-secondary-accent-200 font-heading font-semibold uppercase tracking-wider leading-loose mobile:text-3xl laptop:text-4xl',
	'h4' => 'mb-3 group-even/section:text-primary-400 group-odd/section:text-secondary-400 font-heading font-medium uppercase tracking-wider leading-loose mobile:text-2xl laptop:text-3xl',
	'h5' => 'mb-3 group-even/section:text-primary-400 group-odd/section:text-secondary-400 font-heading font-normal uppercase tracking-wider leading-loose mobile:text-2xl laptop:text-3xl',
	'h6' => 'mb-3 group-even/section:text-primary-400 group-odd/section:text-secondary-400 font-heading font-light uppercase tracking-wider leading-loose mobile:text-2xl laptop:text-3xl',
	'preheader' => 'mb-3 group-even/section:text-primary-accent-200 group-odd/section:text-secondary-accent-200 font-heading font-light uppercase tracking-wider leading-loose mobile:text-xl laptop:text-xl',
];

$class = $classes[$style].' '.$class;
@endphp

@switch($tag)
@case('h1')
<h1 id="{{ $id }}" class="{{ $class }}">{{ $slot }}</h1>
@break

@case('h2')
<h2 id="{{ $id }}" class="{{ $class }}">{{ $slot }}</h2>
@break

@case('h3')
<h3 id="{{ $id }}" class="{{ $class }}">{{ $slot }}</h3>
@break

@case('h4')
<h4 id="{{ $id }}" class="{{ $class }}">{{ $slot }}</h4>
@break

@case('h5')
<h5 id="{{ $id }}" class="{{ $class }}">{{ $slot }}</h5>
@break

@case('h6')
<h6 id="{{ $id }}" class="{{ $class }}">{{ $slot }}</h6>
@break

@case('span')
<span id="{{ $id }}" class="{{ $class }}">{{ $slot }}</span>
@break

@endswitch