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
$defaults = 'px-6 py-3 rounded-full inline-block font-bold cursor-pointer leading-none tracking-wider text-center';

$actives = [
'none' => '',
'primary' => 'bg-primary text-white hover:bg-primary-300 active:bg-primary-600',
'secondary' => 'bg-surface-dark text-white hover:bg-surface-dark-300 active:bg-surface-dark-900',
];

$disables = [
'none' => '',
'primary' => 'pointer-events-none',
'secondary' => 'pointer-events-none',
];

$sizes = [
'none' => '',
'small' => 'text-xs',
'default' => 'text-sm',
];

// Set class
if($disabled === true) {
$class = $defaults . ' ' . $disables[$style] . ' ' . $sizes[$size] . ' ' . $class;
}else{
$class = $defaults . ' ' . $actives[$style] . ' ' . $sizes[$size] . ' ' . $class;
}

// Class atts applied to all
$class .= ' mobile:w-full tablet:w-fit transition-all ease-in-out whitespace-nowrap uppercase flex flex-row items-center justify-center gap-2';

// Convert atts array to string
if(count($atts) > 0) {
foreach($atts as $k => $v) { $attributes .= "$k=\"$v\" "; }
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
	<i class="fa-duotone {{ $icon }} fa-lg"></i>
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
	<i class="fa-duotone {{ $icon }} fa-lg"></i>
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
	<i class="fa-duotone {{ $icon }} fa-lg"></i>
	@endif

	{{-- LINK TEXT --}}
	{{ $slot }}
	{{-- --}}

</a>
@endif