@props(['collectionType'])

<x-components::admin-button
	tag="a"
	href="{{ route('admin.create', $collectionType) }}"
	style="primary"
	size="small"
	icon="fa-plus">

	Create
</x-components::admin-button>