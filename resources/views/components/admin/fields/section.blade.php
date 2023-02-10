@props([
	'class' => '',
	'label' => '',
	'desc' => '',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-acomponents::heading tag="h3" style="h3" :subtext="$desc">
			{{ $label }}
		</x-acomponents::heading>
	@endisset

	<hr>
</div>