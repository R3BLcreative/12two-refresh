@props([
	'id' => 'social-channels-nav',
	'class' => '',
	'style' => 'text-primary-100 hover:text-primary-200 active:text-primary-300 w-8 h-fit'
])

<nav id="social-channels-nav" class="mobile:flex items-center justify-between gap-3 w-full mobile:text-2xl tablet:text-base {{ $class }}">
	<x-components::social-item network="instagram" class="{{ $style }}" />
	<x-components::social-item network="facebook" class="{{ $style }}" />
	<x-components::social-item network="twitter" class="{{ $style }}" />
	<x-components::social-item network="youtube" class="{{ $style }}" />
</nav>