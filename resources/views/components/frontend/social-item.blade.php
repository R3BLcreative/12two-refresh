@props([
'network' => '', // Social icon reference
'class' => '', // Class defs
])

@php
$networks = [
'instagram' => [
'url' => 'https://www.instagram.com/12twomissions/',
'label' => 'Follow 12Two Missions on Instagram',
'class' => 'fa-brands fa-instagram fa-lg',
],
'facebook' => [
'url' => 'https://www.facebook.com/12twomissions/',
'label' => 'Follow 12Two Missions on Facebook',
'class' => 'fa-brands fa-facebook-f fa-lg',
],
'twitter' => [
'url' => 'https://twitter.com/12TwoMissions',
'label' => 'Follow 12Two Missions on Twitter',
'class' => 'fa-brands fa-twitter fa-lg',
],
'youtube' => [
'url' => 'https://www.youtube.com/channel/UC-2iqRvA0N6NiFNRvC5LZPQ',
'label' => 'Like and Subscribe to the 12Two Missions YouTube channel',
'class' => 'fa-brands fa-youtube fa-lg',
],
]
@endphp

<a href="{{ $networks[$network]['url'] }}" target="_blank" rel="external nofollow noopener" aria-label="{{ $networks[$network]['label'] }}" class="{{ $class }}">
	<i class="{{ $networks[$network]['class'] }}"></i>
</a>