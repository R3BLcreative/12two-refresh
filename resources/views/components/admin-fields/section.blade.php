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
		<x-components::admin-heading tag="h3" style="h3" :subtext="$desc">
			{{ $label }}
		</x-components::admin-heading>
	@endisset

	<hr>
</div>