@props([
	'items' => [], // Drop down items
	'class' => '', // Drop down class
])

<ul class="laptop:absolute laptop:z-50 laptop:w-fit laptop:rounded-tr-md laptop:rounded-bl-md laptop:max-h-0 laptop:bg-white laptop:border-0 laptop:border-surface-600 laptop:mt-3 laptop:shadow-lg transition-all ease-in-out duration-500 overflow-hidden laptop:group-hover:max-h-96 laptop:group-hover:border">
	@foreach ($items as $item)
		<x-components::main-nav-dropdown-item href="{{ $item['href'] ?? '' }}" route="{{ $item['route'] ?? '' }}" class="{{ $item['class'] ?? '' }}">{{ $item['text'] ?? 'text' }}</x-components::main-nav-dropdown-item>
	@endforeach
</ul>