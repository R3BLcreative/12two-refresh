@props([
'id' => '', // Container ID
'video' => '', // Video link from YouTube
])

@php
// Extract id from video link
parse_str( parse_url( $video, PHP_URL_QUERY ), $vid );
@endphp

<div id="{{ $id }}" class="relative pb-[56.25%] pt-[30px] h-0">
	<iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $vid['v'] }}"></iframe>
</div>