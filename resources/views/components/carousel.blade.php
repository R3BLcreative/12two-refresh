@props([
'id' => '',
'label' => '',
'card' => '',
'slides' => [],
])


<div id="{{ $id }}" aria-label="{{ $label }}" class="swiper {{ $id }} col-span-full w-full">
	<div class="swiper-wrapper">
		@foreach ($slides as $key => $slide)
		<x-dynamic-component :component="$card" id="{{ $key }}" class="swiper-slide" :content="$slide" />
		@endforeach
	</div>
</div>