@props([
	'columns',
	'items',
	'slug'
])

{{-- HEADER --}}
<div class="grid {{ $columns->template }} gap-4 bg-surface-light-500 px-8 py-3 shadow-sm font-black border-t border-b border-gray-300 text-body-light-600 relative z-99">
	@foreach ($columns->items as $column)
		@isset($column->icon)
			<div class="{{ $column->class }} !text-base"><i class="fa-duotone {{ $column->icon }} text-2xl"></i></div>
		@else
			<div class="{{ $column->class }} !text-base">{{ $column->text }}</div>
		@endisset
	@endforeach

	<div class="text-center">Actions</div>
</div>

<div class="overflow-auto overscroll-contain flex-auto">
	{{-- ITEMS --}}
	@foreach ($items as $item)
		<div class="grid {{ $columns->template }} items-center px-8 py-4 gap-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group/row">
			@foreach ($columns->items as $column)
				@switch($column->type)
					@case('id')
						<div class="text-center font-semibold text-gray-500 {{ $column->class }}">{{ $item->id }}</div>
						@break

					@case('category')
						<div class="text-center text-sm {{ $column->class }}">{{ $item->category->label }}</div>
						@break

					@case('slug')
						<div class="text-center text-sm font-semibold {{ $column->class }}">{{ $item->slug }}</div>
						@break

					@case('user_role')
						<div class="text-center text-sm uppercase font-semibold {{ $column->class }}">
							{{ $item->getRoleNames()[0] }}
						</div>
						@break

					@case('timestamp')
						<div class="text-center text-sm flex flex-col items-center justify-center text-gray-500 {{ $column->class }}">
							<span class="font-semibold">{{ date('m/d/Y', strtotime($item->{$column->key})) }}</span>
							<span class="italic">{{ date('h:i a', strtotime($item->{$column->key})) }}</span>
						</div>
						@break

					@case('icon')
						<div class="text-center text-3xl text-body-light-600 {{ $column->class }}"><i class="fa-duotone {{ $item->{$column->key} ?? $item->fields->{$column->key} }}"></i></div>
						@break

					@case('main')
						<a href="{{ route('admin.edit', ['slug' => $slug, 'id' => $item->id]) }}" class="text-base font-extrabold group-hover/row:text-primary-500 {{ $column->class }}">
							{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
						</a>
						@break

					@case('text')
						<div class="line-clamp-2 {{ $column->class }}">
							{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
						</div>
						@break

					@default
						<div class="{{ $column->class }}">{{ $item->{$column->key} ?? $item->fields->{$column->key} }}</div>
				@endswitch
			@endforeach

			<x-components::admin-actions :item="$item" :slug="$slug" />
		</div>
	@endforeach

	{{-- FILLER --}}
	@for ($i = 15; $i > 0; $i--)
		<div class="grid {{ $columns->template }} items-center px-8 py-4 gap-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group/row">
			@foreach ($columns->items as $column)
				@switch($column->type)
					@case('id')
						<div>{{ $i }}</div>
						@break

					@default
						<div>&nbsp;</div>
				@endswitch
			@endforeach
		</div>
	@endfor

</div>