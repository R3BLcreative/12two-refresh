@props([
	'collectionType',
	'items',
])

{{-- HEADER --}}
<div class="grid {{ $collectionType->meta->columns->template }} gap-4 bg-surface-light-500 px-8 py-3 shadow-sm font-black border-t border-b border-gray-300 text-body-light-600 relative z-99">
	@foreach ($collectionType->meta->columns->items as $column)
		@isset($column->icon)
			<div class="{{ $column->class }} !text-base"><i class="fa-duotone {{ $column->icon }} text-2xl"></i></div>
		@else
			<div class="{{ $column->class }} !capitalize !text-base">{{ $column->text }}</div>
		@endisset
	@endforeach
</div>

<div class="overflow-auto overscroll-contain flex-auto">
	{{-- ITEMS --}}
	@foreach ($items as $index => $item)
		<div class="grid {{ $collectionType->meta->columns->template }} items-center px-8 py-4 gap-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group/row">
			@foreach ($collectionType->meta->columns->items as $column)
				@switch($column->type)
					@case('id')
						<div class="text-center font-semibold text-gray-500 {{ $column->class }}">{{ $item->id }}</div>
						@break

					@case('order')
						<div class="text-center font-semibold text-gray-500 {{ $column->class }}">
							{{ $item->order; }}
						</div>
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
						<a href="{{ route('admin.edit', [$collectionType, $item->id]) }}" class="text-base font-extrabold group-hover/row:text-primary-500 {{ $column->class }}">
							{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
						</a>
						@break

					@case('main-plural')
						<a href="{{ route('admin.edit', [$collectionType, $item->id]) }}" class="text-base font-extrabold group-hover/row:text-primary-500 {{ $column->class }}">
							@if ($item->force_single)
								{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
							@else
								{{ Str::plural($item->{$column->key}) ?? Str::plural($item->fields->{$column->key}) }}
							@endif
						</a>
						@break

					@case('text')
						<div class="line-clamp-2 {{ $column->class }}">
							{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
						</div>
						@break

					@case('actions')
						<x-components::admin-actions :item="$item" :collectionType="$collectionType" />
						@break

					@default
						<div class="{{ $column->class }}">{{ $item->{$column->key} ?? $item->fields->{$column->key} }}</div>
				@endswitch
			@endforeach

		</div>
	@endforeach

</div>