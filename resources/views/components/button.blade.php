@props([
'id' => '', // ID attribute text
'tag' => 'a', // a, button, submit
'href' => '#', // url, #, null
'text' => 'This is a button', // link/button text
'alt' => 'Button descriptive text', // A11Y descriptive text
'style' => 'none', // none, primary, secondary, tertiary, alternative
'disabled' => false, // boolean
'size' => 'default', // none, small, default
'rel' => '', // nofollow, noopener, external
'target' => '_self', // _blank, _self
'atts' => [], // Additional attributes to add to the button/link ie: data-atts
'class' => '', // Additional class atts/overrides
'icon' => '', //
])

{{-- CLASS DEFINITIONS --}}
@php
$actives = [
'none' => '',
'primary' => 'bg-primary-500 text-white rounded-full inline-block font-bold border-none cursor-pointer leading-none tracking-wider hover:bg-primary-300 active:bg-primary-700 text-center',
'secondary' => 'bg-secondary-500 text-body-800 rounded-full inline-block font-bold border-none cursor-pointer leading-none tracking-wider hover:bg-secondary-300 active:bg-secondary-600 text-center',
'tertiary' => 'text-primary-100 font-semibold hover:text-primary-200 hover:underline active:text-primary-300 active:no-underline',
];

$disables = [
'none' => '',
'primary' => 'bg-body-400 text-white rounded-full inline-block font-semibold border-none leading-none tracking-wide hover:bg-alert-100 pointer-events-none text-center',
'secondary' => 'bg-white text-surface-400 border-surface-400 border-2 rounded-full inline-block font-semibold leading-none tracking-wide pointer-events-none text-center',
'tertiary' => 'text-body-400 font-semibold mobile:text-sm desktop:text-base pointer-events-none',
];

$sizes = [
'none' => '',
'small' => 'px-7 py-2 text-sm',
'default' => 'px-9 py-4 text-base',
];

// Set class
if($disabled === true) {
$class = $disables[$style] . ' ' . $sizes[$size] . ' ' . $class;
}else{
$class = $actives[$style] . ' ' . $sizes[$size] . ' ' . $class;
}

// Class atts applied to all
$class .= ' mobile:w-full tablet:w-fit transition-all ease-in-out whitespace-nowrap uppercase flex flex-row items-center justify-center gap-4';

// Convert atts array to string
if(count($atts) > 0) {
foreach($atts as $k => $v) { $attributes .= "$k=$v"; }
}else{
$attributes = '';
}
@endphp

{{-- SUBMIT --}}
@if($tag == 'submit')
<button
	id="{{ $id }}"
	type="submit"
	aria-label="{{ $alt }}"
	class="{{ $class }}"
	{{ $attributes }} @if($disabled) disabled @endif>

	@if($icon)
	<i class="{{ $icon }} fa-lg"></i>
	@endif

	{{-- BUTTON TEXT --}}
	{{ $text }}
	{{-- --}}
</button>

{{-- BUTTON --}}
@elseif($tag == 'button')
<button
	id="{{ $id }}"
	aria-label="{{ $alt }}"
	class="{{ $class }}"
	{{ $attributes }} @if($disabled) disabled @endif>

	@if($icon)
	<i class="{{ $icon }} fa-lg"></i>
	@endif

	{{-- BUTTON TEXT --}}
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

	@if($icon)
	<i class="{{ $icon }} fa-lg"></i>
	@endif

	{{-- LINK TEXT --}}
	{{ $text }}
	{{-- --}}

</a>
@endif