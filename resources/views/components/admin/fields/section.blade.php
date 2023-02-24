@props([
	'id' => 'section',
	'class' => 'col-span-full',
	'label' => '',
	'desc',
	])

<div id="{{ $id }}" class="flex flex-col gap-2 {{ $class }}">
	@if(!empty($label))
		<x-acomponents::heading tag="h3" style="h3" :subtext="$desc ?? ''">
			{{ $label }}
		</x-acomponents::heading>
	@endif

	<hr class="mt-3 mb-3" />
</div>