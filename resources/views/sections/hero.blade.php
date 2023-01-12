@props([
'preheader' => '',
'title' => '',
'body' => '',
'ctas' => '',
'image' => '',
'video' => '',
'alt' => '',
])

<x-sections::section id="hero" class="">
	<row class="!items-center">
		<div class="mobile:col-span-full mobile:order-2 tablet:col-span-4 tablet:order-1 laptop:col-span-7">

			@if($preheader)
				<x-components::heading tag="span" style="preheader">{{ $preheader }}</x-components::heading>
			@endif

			@if($title)
				<x-components::heading tag="h1" style="h1">{{ $title }}</x-components::heading>
			@endif

			@if($body)
				{!! $body !!}
			@endif

			@if($ctas)
				<div {{ $ctas->attributes }}>
					{{ $ctas }}
				</div>
			@endif

		</div>

		@if($image || $video)
			<div class="mobile:col-span-full mobile:order-1 tablet:col-span-4 tablet:order-2 laptop:col-span-5">

				{{-- By default images are hidden on mobile --}}
				@if($image)
					<x-components::image id="hero-image" image="{{ $image }}" alt="{{ $alt }}" class="mobile:hidden  tablet:inline-block w-full h-auto" loading="" />

				{{-- By default videos are displayed above the content on mobile --}}
				@elseif($video)
					<x-components::video id="hero-video" video="{{ $video }}" />
				@endif

			</div>
		@endif
	</row>
</x-sections::section>