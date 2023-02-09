@props(['collectionType'])

<x-acomponents::button
	tag="a"
	href="{{ route('admin.collections.create', $collectionType) }}"
	style="primary"
	size="small"
	icon="fa-plus">

	Create
</x-acomponents::button>