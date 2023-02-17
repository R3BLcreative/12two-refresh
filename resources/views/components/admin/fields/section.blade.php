@props([
	'class' => 'col-span-full',
	'label' => '',
	'desc',
	])

<div class="flex flex-col gap-2 {{ $class }}">
	@isset($label)
		<x-acomponents::heading tag="h3" style="h3" :subtext="$desc ?? ''">
			{{ $label }}
		</x-acomponents::heading>
	@endisset

	<hr>
</div>