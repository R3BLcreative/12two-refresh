@props([
	'columns',
	'items',
	'slug',
	'grid'
])

{{-- HEADER --}}
<div class="sticky top-0 z-10 grid gap-4 bg-surface-light-500 px-8 py-3 shadow-sm font-black border-t border-b border-gray-300 text-body-light-600 w-full {{ $grid }}">
	@foreach ($columns as $column)
		@isset($column->icon)
			<div class="{{ $column->class }}"><i class="fa-duotone {{ $column->icon }} text-2xl"></i></div>
		@else
			<div class="{{ $column->class }}">{{ $column->text }}</div>
		@endisset
	@endforeach
</div>

{{-- ITEMS --}}
@foreach ($items as $item)
	<a href="{{ route('admin.edit', ['slug' => $slug, 'id' => $item->id]) }}" class="grid items-center w-full px-8 py-4 gap-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group {{ $grid }}">
		@foreach ($columns as $column)
			@switch($column->type)
				@case('id')
					<div class="text-center font-semibold text-gray-500">{{ $item->id }}</div>
					@break

				@case('category')
					<div class="text-center text-sm">{{ $item->category->label }}</div>
					@break

				@case('slug')
					<div class="text-center text-sm font-semibold">{{ $item->slug }}</div>
					@break

				@case('user_role')
					<div class="text-center text-sm uppercase font-semibold">
						{{ $item->getRoleNames()[0] }}
					</div>
					@break

				@case('timestamp')
					<div class="text-center text-sm flex flex-col items-center justify-center text-gray-500">
						<span class="font-semibold">{{ date('m/d/Y', strtotime($item->{$column->key})) }}</span>
						<span class="italic">{{ date('h:i a', strtotime($item->{$column->key})) }}</span>
					</div>
					@break

				@case('icon')
					<div class="text-center text-3xl text-body-light-600"><i class="fa-duotone {{ $item->{$column->key} }}"></i></div>
					@break

				@case('main')
					<div class="font-semibold text-md group-hover:text-primary-500">{{ $item->{$column->key} ?? $item->fields->{$column->key} }}</div>
					@break

				@default
					<div class="{{ $column->class }}">{{ $item->{$column->key} }}</div>
			@endswitch
		@endforeach
	</a>
@endforeach