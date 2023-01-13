@props([
'id' => '', // ID attribute text
'href' => '#', // url, #, null
'rel' => '', // nofollow, noopener, external
'target' => '_self', // _blank, _self
'atts' => [], // Additional attributes to add to the button/link ie: data-atts
// Class is available but not set here in order for the logic below to work
])

<a
	id="{{ $id }}"
	href="{{ $href }}"
	rel="{{ $rel }}"
	target="{{ $target }}"
	class="transition-all ease-in-out w-fit inline hover:underline {{ $class ?? 'font-semibold group-odd/section:text-secondary-accent-400 group-odd/section:hover:text-secondary-accent-200 group-odd/section:active:text-secondary-accent-600 group-odd/section:active:no-underline group-even/section:text-primary-accent-500 group-even/section:hover:text-primary-accent-200 group-even/section:active:text-primary-accent-600 group-even/section:active:no-underline' }}"
	{{ $attributes }}>

	{{-- LINK TEXT --}}
	{{ $slot }}
	{{-- --}}

</a>