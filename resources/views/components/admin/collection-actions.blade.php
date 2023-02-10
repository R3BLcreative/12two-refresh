@props(['item', 'collectionType', 'actions'])

<div class="flex items-center justify-center gap-5">
	{{-- INFO --}}
	@if($actions->info)
		<x-acomponents::actions-item icon="fa-calendar-clock">
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
		</x-acomponents::actions-item>
	@endif

	{{-- DELETE --}}
	@if($actions->delete)
		<x-acomponents::actions-item icon="fa-trash" onclick="event.preventDefault();document.getElementById('delete-form-{{ $item->id }}').submit();">
			<form
			id="delete-form-{{ $item->id }}"
			action="{{ route('admin.collections.destroy', [$collectionType, $item->id]) }}"
			method="post"
			class="hidden">@csrf @method('delete')</form>
		</x-acomponents::actions-item>
	@endif
</div>