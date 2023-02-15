@props(['item', 'collectionType', 'actions'])

<div class="flex items-center justify-center gap-5">
	{{-- INFO --}}
	@if($actions->info)
		<x-acomponents::actions-item icon="fa-calendar-clock">
			<div class="p-4 border-r border-surface-white-500">
				<span class="font-bold text-dm">Created</span>
				<span class="font-semibold text-xs">
					<x-date-time-zone :datetime="$item->created_at" format="m/d/Y" />
				</span>
				<span class="italic text-xs">
					<x-date-time-zone :datetime="$item->created_at" format="h:i a" />
				</span>
			</div>

			<div class="p-4">
				<span class="font-bold text-dm">Updated</span>
				<span class="font-semibold text-xs">
					<x-date-time-zone :datetime="$item->updated_at" format="m/d/Y" />
				</span>
				<span class="italic text-xs">
					<x-date-time-zone :datetime="$item->updated_at" format="h:i a" />
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