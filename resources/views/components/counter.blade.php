@props([
	'value' => 500, // Int val
	'speed' => 450, // Int val for the animation speed
	'icon' => '', // Icon to add to counter
	'iconc' => '', // Class decs for icon wrapper
	'icons' => '', // Style decs for icon
	'text' => 'sample text', // Descriptive text after counter
	'textc' => '', // Class decs for text wrapper
	'wrapper' => '', // Class decs for wrapper
	'counter' => '', // Class decs for counter
	'before' => '', // Content before counter
	'beforec' => '', // Class decs for before wrapper
	'after' => '', // Content after counter
	'afterc' => '', // Class decs for after wrapper
])

<div class="{{ $wrapper }}">
	@if($icon)
		<span class="{{ $iconc }}" style="{{ $icons }}"><i class="{{ $icon }}"></i></span>
	@endif

	<div class="flex flex-row flex-nowrap items-center justify-center gap-1">
		@if($before)
			<span class="{{ $beforec }}">{{ $before }}</span>
		@endif

		<span class="counter {{ $counter }}" data-value="{{ $value }}" data-speed="{{ $speed }}">0</span>

		@if($after)
			<span class="{{ $afterc }}">{{ $after }}</span>
		@endif
	</div>

	<span class="{{ $textc }}">{{ $text }}</span>

</div>