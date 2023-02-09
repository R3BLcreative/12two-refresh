@props([
	'class',
	'id',
	'label',
	'value' => '',
	'placeholder',
	'desc',
	'required',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-acomponents::heading tag="h3" style="h3" :subtext="$desc">
			{{ $label }}
		</x-acomponents::heading>
	@endisset

	<hr>
</div>