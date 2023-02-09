@props(['category'])

<div class="flex flex-col gap-4">
	<x-acomponents::heading tag="h2" style="nav" subtext="{{ $category['heading']['subtext'] }}" class="px-2">
		{{ $category['heading']['title'] }}
	</x-acomponents::heading>

	<ul class="flex flex-col flex-auto gap-2">
		@if($category['heading']['title'] == 'Settings')
			{{-- USERS --}}
			<x-acomponents::nav-item :item="json_decode(json_encode([
				'slug' => 'users',
				'icon' => 'fa-users',
				'label' => 'User',
				'route' => route('admin.users.index'),
				'force_single' => false,
				]))" />

			{{-- OPTIONS --}}
			<x-acomponents::nav-item :item="json_decode(json_encode([
				'slug' => 'options',
				'icon' => 'fa-gears',
				'label' => 'Option',
				'route' => route('admin.options.index'),
				'force_single' => false,
				]))" />

			{{-- MENUS --}}
			<x-acomponents::nav-item :item="json_decode(json_encode([
				'slug' => 'menus',
				'icon' => 'fa-list-dropdown',
				'label' => 'Menu',
				'route' => route('admin.menus.index'),
				'force_single' => false,
				]))" />
		@endif
		@foreach ($category['items'] as $item)
			@can($item->permission)
				<x-acomponents::nav-item :item="$item" />
			@endcan
		@endforeach
	</ul>
</div>