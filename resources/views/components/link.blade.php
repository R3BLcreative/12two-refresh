@props([
'id' => '',// ID attribute text
'href' => '#',// url, #, null
'text' => 'This is a link',// link/button text
'rel' => '',// nofollow, noopener, external
'target' => '_self',// _blank, _self
'atts' => [],// Additional attributes to add to the button/link ie: data-atts
'class' => '',// Additional class atts/overrides
])

<a
	id="{{ $id }}"
	href="{{ $href }}"
	rel="{{ $rel }}"
	target="{{ $target }}"
	class="transition-all ease-in-out w-fit inline text-primary-100 font-semibold hover:text-primary-200 hover:underline active:text-primary-300 active:no-underline {{ $class }}"
	{{ $attributes }}>

	{{-- LINK TEXT --}}
	{{ $text }}
	{{-- --}}

</a>