@props([
'id' => '', // ID attribute text
'tag' => 'a', // a, button, submit
'href' => '#', // url, #, null
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
$defaults = 'rounded-lg inline-block font-bold cursor-pointer leading-none tracking-wider text-center shadow hover:shadow-xl active:shadow-none';

$actives = [
'none' => '',
'primary' => 'bg-primary-500 text-body-50 hover:bg-primary-300 active:bg-primary-600',
'secondary' => 'bg-secondary-500 text-body-800 hover:bg-secondary-300 active:bg-secondary-600',
'accent' => 'group-odd/section:bg-secondary-accent-500 group-odd/section:text-body-50 group-odd/section:hover:bg-secondary-accent-400 group-odd/section:active:bg-secondary-accent-600 group-even/section:bg-primary-accent-500 group-even/section:text-body-50 group-even/section:hover:bg-primary-accent-400 group-even/section:active:bg-primary-accent-600',
];

$disables = [
'none' => '',
'primary' => 'pointer-events-none',
'secondary' => 'pointer-events-none',
];

$sizes = [
'none' => '',
'small' => 'px-8 py-3 text-sm',
'default' => 'px-9 py-4 text-base',
];

// Set class
if($disabled === true) {
$class = $defaults . ' ' . $disables[$style] . ' ' . $sizes[$size] . ' ' . $class;
}else{
$class = $defaults . ' ' . $actives[$style] . ' ' . $sizes[$size] . ' ' . $class;
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
	{{ $slot }}
	{{-- --}}
</button>

{{-- BUTTON --}}
@elseif($tag == 'button')
<button
	id="{{ $id }}"
	type="button"
	aria-label="{{ $alt }}"
	class="{{ $class }}"
	{{ $attributes }} @if($disabled) disabled @endif>

	@if($icon)
	<i class="{{ $icon }} fa-lg"></i>
	@endif

	{{-- BUTTON TEXT --}}
	{{ $slot }}
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
	{{ $slot }}
	{{-- --}}

</a>
@endif