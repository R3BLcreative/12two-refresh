@props([
'id' => '',// Element ID attribute
'tag' => 'h1',// h1, h2, h3, h4, h5, h6, span
'style' => 'h1',// h1, h2, h3, h4, h5, h6, nav, badges, tableheader
'text' => 'Default Text',// The actual heading text
'class' => '',// Additional class atts/overrides
])

@php
$classes = [
'h1' => 'mb-1 text-primary-100 font-serif font-medium mobile:text-4xl laptop:text-5xl mobile:leading-mh1 laptop:leading-h1',
'h2' => 'mb-1 text-primary-300 font-serif font-medium mobile:text-3xl laptop:text-4xl mobile:leading-mh2 laptop:leading-h2',
'h3' => 'mb-1 text-primary-300 font-sans font-semibold mobile:text-2xl laptop:text-3xl mobile:leading-mh3 laptop:leading-h3',
'h4' => 'mb-1 text-primary-300 font-sans font-semibold mobile:text-xl laptop:text-2xl mobile:leading-mh4 laptop:leading-h4',
'h5' => 'mb-1 text-primary-300 font-sans mobile:font-semibold mobile:text-lg laptop:font-medium laptop:text-xl mobile:leading-mh5 laptop:leading-h5',
'h6' => 'mb-1 text-body-100 font-sans font-semibold tracking-wide text-sm mb-8 mobile:leading-mh6 laptop:leading-h6',
'nav' => 'mb-1 text-body-100 font-sans font-semibold text-base uppercase tracking-widest',
'badges' => 'mb-1 text-body-100 font-sans font-bold text-xs uppercase tracking-wider',
'tableheader' => 'mb-1 text-body-100 font-sans font-medium text-sm uppercase tracking-wide',
];

$class = $classes[$style].' '.$class;
@endphp

@switch($tag)
@case('h1')
<h1 id="{{ $id }}" class="{{ $class }}">{{ $text }}</h1>
@break

@case('h2')
<h2 id="{{ $id }}" class="{{ $class }}">{{ $text }}</h2>
@break

@case('h3')
<h3 id="{{ $id }}" class="{{ $class }}">{{ $text }}</h3>
@break

@case('h4')
<h4 id="{{ $id }}" class="{{ $class }}">{{ $text }}</h4>
@break

@case('h5')
<h5 id="{{ $id }}" class="{{ $class }}">{{ $text }}</h5>
@break

@case('h6')
<h6 id="{{ $id }}" class="{{ $class }}">{{ $text }}</h6>
@break

@case('span')
<span id="{{ $id }}" class="{{ $class }}">{{ $text }}</span>
@break

@endswitch