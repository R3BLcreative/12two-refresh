@props([
'title' => '',
'body' => '',
'id' => '',
'label' => '',
'card' => '',
'slides' => [],
])

<section>
	<row>
		<div class="col-span-full flex flex-row flex-nowrap items-center justify-between gap-3">
			{{-- TITLE --}}
			@if($title)
			<x-components::heading tag="h2" style="h2" text="{{ $title }}" class="" />
			@endif

			{{-- CAROUSEL NAV --}}
			<nav class="flex items-center justify-end gap-3" aria-label="{{ $label }} Navigation">
				<button class="border-2 border-primary-100 text-primary-100 rounded-full hover:border-primary-200 hover:text-primary-200 active:border-primary-300 active:text-primary-300 flex items-center justify-center w-6 h-6 leading-none font-semibold carousel-prev" aria-label="Go to previous slide" aria-controls="{{ $id }}">
					&lt;
				</button>
				<button class="border-2 border-primary-100 text-primary-100 rounded-full hover:border-primary-200 hover:text-primary-200 active:border-primary-300 active:text-primary-300 flex items-center justify-center w-6 h-6 leading-none font-semibold carousel-next" aria-label="Go to next slide" aria-controls="{{ $id }}">
					&gt;
				</button>
			</nav>
		</div>

		{{-- BODY --}}
		@if($body)
		<div class="col-span-full">
			{!! $body !!}
		</div>
		@endif

		{{-- CAROUSEL --}}
		<x-components::carousel id="{{ $id }}" label="{{ $label }}" card="{{ $card }}" :slides="$slides" />
	</row>
</section>