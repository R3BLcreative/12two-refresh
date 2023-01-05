@props([
'id' => '',// ID attribute text
'tag' => 'a',// a, button, input
'href' => '#',// url, #, null
'text' => 'This is a button',// link/button text
'alt' => 'Button descriptive text',// A11Y descriptive text
'style' => 'none',// none, primary, secondary, tertiary, alternative
'disabled' => false,// boolean
'size' => 'default',// none, small, default
'rel' => '',// nofollow, noopener, external
'target' => '_self',// _blank, _self
'atts' => [],// Additional attributes to add to the button/link ie: data-atts
'class' => '',// Additional class atts/overrides
])

{{-- CLASS DEFINITIONS --}}
@php
$actives = [
'none' => '',
'primary' => 'bg-primary-100 text-white rounded-full inline-block font-semibold border-none cursor-pointer leading-none tracking-wide hover:bg-primary-200 active:bg-primary-300 text-center',
'secondary' => 'bg-white text-primary-100 border-primary-100 border-2 rounded-full inline-block font-semibold leading-none tracking-wide hover:bg-primary-200 hover:border-primary-200 hover:text-white active:bg-primary-300 active:border-primary-300 active:text-white cursor-pointer text-center',
'tertiary' => 'text-primary-100 font-semibold hover:text-primary-200 hover:underline active:text-primary-300 active:no-underline',
];

$disables = [
'none' => '',
'primary' => 'bg-surface-400 text-white rounded-full inline-block font-semibold border-none leading-none tracking-wide hover:bg-alert-100 pointer-events-none text-center',
'secondary' => 'bg-white text-surface-400 border-surface-400 border-2 rounded-full inline-block font-semibold leading-none tracking-wide pointer-events-none text-center',
'tertiary' => 'text-surface-400 font-semibold mobile:text-sm desktop:text-base pointer-events-none',
];

$sizes = [
'none' => '',
'small' => 'px-3 py-1 text-sm',
'default' => 'px-4 py-3 mobile:text-sm desktop:text-base',
];

// Set class
if($disabled === true) {
$class = $disables[$style] . ' ' . $sizes[$size] . ' ' . $class;
}else{
$class = $actives[$style] . ' ' . $sizes[$size] . ' ' . $class;
}

// Class atts applied to all
$class .= ' mobile:w-full tablet:w-fit transition-all ease-in-out whitespace-nowrap';

// Convert atts array to string
if(count($atts) > 0) {
foreach($atts as $k => $v) { $attributes .= "$k=$v"; }
}else{
$attributes = '';
}
@endphp

{{-- INPUT --}}
@if($tag == 'input')
<input
	id="{{ $id }}"
	type="button"
	aria-label="{{ $alt }}"
	class="{{ $class }}"
	value="{{ $text }}"
	{{ $attributes }} @if($disabled) disabled @endif>

{{-- SUBMIT --}}
@elseif($tag == 'submit')
<input
	id="{{ $id }}"
	type="submit"
	aria-label="{{ $alt }}"
	class="{{ $class }}"
	value="{{ $text }}"
	{{ $attributes }} @if($disabled) disabled @endif>

{{-- BUTTON --}}
@elseif($tag == 'button')
<button
	id="{{ $id }}"
	aria-label="{{ $alt }}"
	class="{{ $class }}"
	{{ $attributes }} @if($disabled) disabled @endif>

	{{-- LINK TEXT --}}
	{{ $text }}
	{{-- --}}

</button>

{{-- LINK --}}
@else
<a
	id="{{ $id }}"
	href="{{ $href }}"
	aria-label="{{ $alt }}"
	rel="{{ $rel }}"
	target="{{ $target }}"
	class="{{ $class }}"
	{{ $attributes }}>

	{{-- LINK TEXT --}}
	{{ $text }}
	{{-- --}}

</a>
@endif