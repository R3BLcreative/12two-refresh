@props(['item', 'collectionType'])

<div class="flex items-center justify-center gap-5">
	{{-- MENU --}}
	<x-components::admin-actions-item icon="fa-list-dropdown">
		<ul class="flex flex-col gap-2 w-[150px]">
			<x-components::admin-actions-menu-item route="{{ route('admin.edit', [$collectionType, $item->id]) }}">
				Edit
			</x-components::admin-actions-menu-item>
			<x-components::admin-actions-menu-item click="event.preventDefault();document.getElementById('delete-form').submit();">
				Delete
				<form
					id="delete-form"
					action="{{ route('admin.destroy', [$collectionType, $item->id]) }}"
					method="post"
					class="hidden">@csrf @method('delete')</form>
			</x-components::admin-actions-menu-item>
			<x-components::admin-actions-menu-item>
				Option
			</x-components::admin-actions-menu-item>
			<x-components::admin-actions-menu-item>
				Option
			</x-components::admin-actions-menu-item>
		</ul>
	</x-components::admin-actions-item>

	{{-- INFO --}}
	<x-components::admin-actions-item icon="fa-calendar-clock">
		<div class="p-4 border-r border-surface-white-500">
			<span class="font-bold text-dm">Created</span>
			<span class="font-semibold text-xs">
				{{ date('m/d/Y', strtotime($item->created_at)) }}
			</span>
			<span class="italic text-xs">
				{{ date('h:i a', strtotime($item->created_at)) }}
			</span>
		</div>

		<div class="p-4">
			<span class="font-bold text-dm">Updated</span>
			<span class="font-semibold text-xs">
				{{ date('m/d/Y', strtotime($item->updated_at)) }}
			</span>
			<span class="italic text-xs">
				{{ date('h:i a', strtotime($item->updated_at)) }}
			</span>
		</div>
	</x-components::admin-actions-item>
</div>