@props([
'network' => '', // Social icon reference
'class' => '', // Class decs
])

@php
$networks = [
'instagram' => [
'url' => 'https://www.instagram.com/helloalice_com/',
'label' => 'Follow Hello Alice on Instagram',
],
'tiktok' => [
'url' => 'https://www.tiktok.com/@helloalice.com',
'label' => 'Follow Hello Alice on TikTok',
],
'facebook' => [
'url' => 'https://www.facebook.com/AliceConnects',
'label' => 'Follow Hello Alice on Facebook',
],
'twitter' => [
'url' => 'https://twitter.com/HelloAlice',
'label' => 'Follow Hello Alice on Twitter',
],
'linkedin' => [
'url' => 'https://www.linkedin.com/company/helloalice',
'label' => 'Follow Hello Alice on LinkedIn',
],
'youtube' => [
'url' => 'https://www.youtube.com/channel/UCfhLefUi2bhYoImQlUrVFaw',
'label' => 'Like and Subscribe to the Hello Alice YouTube channel',
],
]
@endphp

<a href="{{ $networks[$network]['url'] }}" target="_blank" rel="external nofollow noopener" aria-label="{{ $networks[$network]['label'] }}" class="{{ $class }}">
	{!! setting($network) !!}
</a>