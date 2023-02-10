@props(['route'])

<x-acomponents::button
	tag="a"
	href="{{ $route }}"
	style="primary"
	size="small"
	icon="fa-plus">

	Create
</x-acomponents::button>