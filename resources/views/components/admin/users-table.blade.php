@props(['users'])

@php $grid_temp = 'grid-cols-[40px_auto_150px_150px]'; @endphp

{{-- HEADER --}}
<div class="grid {{ $grid_temp }} bg-gray-200 px-8 py-3 shadow-sm font-black text-body-dark border-y border-gray-300 relative z-99">
	<div class="text-center border-r border-gray-300">ID</div>
	<div class="border-r border-gray-300 pl-6">Name</div>
	<div class="text-center border-r border-gray-300">Type</div>
	<div class="text-center">Actions</div>
</div>

<div class="overflow-auto overscroll-contain flex-auto">

	{{-- ITEMS --}}
	@foreach ($users as $user)
		<div class="grid {{ $grid_temp }} items-center px-8 py-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group/row">
			{{-- ID --}}
			<div class="text-center font-semibold text-gray-500 border-r border-gray-300">
				{{ $user->id }}
			</div>

			{{-- NAME --}}
			<a href="{{ route('admin.users.edit', [$user]) }}" class="flex items-center gap-4 border-r border-gray-300 pl-6">
				<span class="text-base font-extrabold group-hover/row:text-primary-500">
					{{ $user->name }}
				</span>
				@if($user->id == auth()->user()->id)
					<i class="fa-duotone fa-lock opacity-50 text-sm"></i>
				@endif
			</a>

			{{-- ROLE --}}
			<div class="text-center text-sm uppercase font-semibold border-r border-gray-300">
				{{ $user->getRoleNames()[0] }}
			</div>

			{{-- ACTIONS --}}
			<div class="flex items-center justify-center gap-5">
				{{-- INFO --}}
				<x-acomponents::actions-item icon="fa-calendar-clock">
					<div class="p-4 border-r border-surface-white-500">
						<span class="font-bold text-dm">Created</span>
						<span class="font-semibold text-xs">
							<x-date-time-zone :datetime="$user->created_at" format="m/d/Y" />
						</span>
						<span class="italic text-xs">
							<x-date-time-zone :datetime="$user->created_at" format="h:i a" />
						</span>
					</div>

					<div class="p-4">
						<span class="font-bold text-dm">Updated</span>
						<span class="font-semibold text-xs">
							<x-date-time-zone :datetime="$user->updated_at" format="m/d/Y" />
						</span>
						<span class="italic text-xs">
							<x-date-time-zone :datetime="$user->updated_at" format="h:i a" />
						</span>
					</div>
				</x-acomponents::actions-item>

				{{-- DELETE --}}
				<x-acomponents::actions-item icon="fa-trash" onclick="event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();">
					<form
					id="delete-form-{{ $user->id }}"
					action="{{ route('admin.users.destroy', [$user]) }}"
					method="post"
					class="hidden">@csrf @method('delete')</form>
				</x-acomponents::actions-item>

			</div>

		</div>
	@endforeach

</div>