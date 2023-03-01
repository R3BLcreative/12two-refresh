@props([
	'url',
	'label',
	'icon',
	'class' => '',
])

<a
	href="{{ $url }}"
	target="_blank"
	rel="external nofollow noopener"
	aria-label="{{ $label }}"
	class="{{ $class }}">

	<i class="{{ $icon }}"></i>
</a>