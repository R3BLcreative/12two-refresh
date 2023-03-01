@props([
	'id' => 'social-channels-nav',
	'class' => '',
	'style' => 'text-primary-100 hover:text-primary-200 active:text-primary-300 w-8 h-fit'
])

@php
$networks = [
	'instagram' => [
		'url' => 'https://www.instagram.com/12twomissions/',
		'label' => 'Follow 12Two Missions on Instagram',
		'icon' => 'fa-brands fa-instagram fa-lg',
	],
	'facebook' => [
		'url' => 'https://www.facebook.com/12twomissions/',
		'label' => 'Follow 12Two Missions on Facebook',
		'icon' => 'fa-brands fa-facebook-f fa-lg',
	],
	'twitter' => [
		'url' => 'https://twitter.com/12TwoMissions',
		'label' => 'Follow 12Two Missions on Twitter',
		'icon' => 'fa-brands fa-twitter fa-lg',
	],
	'youtube' => [
		'url' => 'https://www.youtube.com/channel/UC-2iqRvA0N6NiFNRvC5LZPQ',
		'label' => 'Like and Subscribe to the 12Two Missions YouTube channel',
		'icon' => 'fa-brands fa-youtube fa-lg',
	],
	]
@endphp

<nav id="social-channels-nav" class="flex items-center justify-end gap-3 w-full mobile:text-2xl tablet:text-base {{ $class }}">

	@foreach($networks as $network)
		<x-components::social-item
			:url="$network['url']"
			:label="$network['label']"
			:icon="$network['icon']"
			:class="$style" />
	@endforeach
</nav>