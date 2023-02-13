@props(['permissions'])

@php $grid_temp = 'grid-cols-[40px_auto_150px_150px]'; @endphp

{{-- HEADER --}}
<div class="grid {{ $grid_temp }} bg-gray-200 px-8 py-3 shadow-sm font-black text-body-dark border-y border-gray-300 relative z-99">
	<div class="text-center border-r border-gray-300">ID</div>
	<div class="border-r border-gray-300 pl-6">Title</div>
	<div class="text-center border-r border-gray-300">Slug</div>
	<div class="text-center">Actions</div>
</div>

<div class="overflow-auto overscroll-contain flex-auto">

	{{-- ITEMS --}}
	@foreach ($permissions as $permission)
		<div class="grid {{ $grid_temp }} items-center px-8 py-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group/row">
			{{-- ID --}}
			<div class="text-center font-semibold text-gray-500 border-r border-gray-300">
				{{ $permission->id }}
			</div>

			{{-- TITLE --}}
			<a href="{{ route('admin.permissions.edit', [$permission]) }}" class="flex items-center gap-4 border-r border-gray-300 pl-6 @if($permission->meta->protected) pointer-events-none @endif">
				<span class="text-base font-extrabold group-hover/row:text-primary-500">
					{{ $permission->meta->title }}
				</span>

				@if($permission->meta->protected)
					<i class="fa-duotone fa-lock opacity-50 text-sm"></i>
				@endif
			</a>

			{{-- REF --}}
			<div class="text-center font-semibold text-sm text-gray-500 border-r border-gray-300">
				{{ $permission->name }}
			</div>

			{{-- ACTIONS --}}
			<div class="flex items-center justify-center gap-5">
				{{-- INFO --}}
				<x-acomponents::actions-item icon="fa-calendar-clock">
					<div class="p-4 border-r border-surface-white-500">
						<span class="font-bold text-dm">Created</span>
						<span class="font-semibold text-xs">
							{{ date('m/d/Y', strtotime($permission->created_at)) }}
						</span>
						<span class="italic text-xs">
							{{ date('h:i a', strtotime($permission->created_at)) }}
						</span>
					</div>

					<div class="p-4">
						<span class="font-bold text-dm">Updated</span>
						<span class="font-semibold text-xs">
							{{ date('m/d/Y', strtotime($permission->updated_at)) }}
						</span>
						<span class="italic text-xs">
							{{ date('h:i a', strtotime($permission->updated_at)) }}
						</span>
					</div>
				</x-acomponents::actions-item>

				{{-- DELETE --}}
				@if(!$permission->meta->protected)
					<x-acomponents::actions-item icon="fa-trash" onclick="event.preventDefault();document.getElementById('delete-form-{{ $permission->id }}').submit();">
						<form
						id="delete-form-{{ $permission->id }}"
						action="{{ route('admin.permissions.destroy', [$permission]) }}"
						method="post"
						class="hidden">@csrf @method('delete')</form>
					</x-acomponents::actions-item>
				@endif

			</div>

		</div>
	@endforeach

</div>