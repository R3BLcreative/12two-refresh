@props([
	'collectionType',
	'items',
])

{{-- HEADER --}}
<div class="grid {{ $collectionType->meta->columns->template }} bg-gray-200 px-8 py-3 shadow-sm font-black text-body-dark border-y border-gray-300 relative z-99">
	@foreach ($collectionType->meta->columns->items as $column)
		@isset($column->icon)
			<div class="{{ $column->class }} !text-base border-r border-gray-300"><i class="fa-duotone {{ $column->icon }} text-2xl"></i></div>
		@else
			<div class="{{ $column->class }} !capitalize !text-base @if($column->type != 'actions') border-r border-gray-300 @endif @if($column->type == 'main') pl-6 @endif">{{ $column->text }}</div>
		@endisset
	@endforeach
</div>

<div class="overflow-auto overscroll-contain flex-auto">

	@if($items->count() > 0)
		{{-- ITEMS --}}
		@foreach ($items as $index => $item)
			@if((isset($item->permission) && auth()->user()->can($item->permission)) || (!$item->hasRole('super') && !auth()->user()->hasRole('super')) || !isset($item->permission))
				<div class="grid {{ $collectionType->meta->columns->template }} items-center px-8 py-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 group/row">
					@foreach ($collectionType->meta->columns->items as $column)
						@switch($column->type)
							@case('id')
								<div class="text-center font-semibold text-gray-500 border-r border-gray-300 {{ $column->class }}">{{ $item->id }}</div>
								@break

							@case('order')
								<div class="text-center font-semibold text-gray-500 border-r border-gray-300 {{ $column->class }}">
									{{ $item->order; }}
								</div>
								@break

							@case('category')
								<div class="text-center text-sm border-r border-gray-300 {{ $column->class }}">{{ $item->category->label }}</div>
								@break

							@case('slug')
								<div class="text-center text-sm font-semibold border-r border-gray-300 {{ $column->class }}">{{ $item->slug }}</div>
								@break

							@case('user_role')
								<div class="text-center text-sm uppercase font-semibold border-r border-gray-300 {{ $column->class }}">
									{{ $item->getRoleNames()[0] }}
								</div>
								@break

							@case('timestamp')
								<div class="text-center text-sm flex flex-col items-center justify-center text-gray-500 border-r border-gray-300 {{ $column->class }}">
									<span class="font-semibold">{{ date('m/d/Y', strtotime($item->{$column->key})) }}</span>
									<span class="italic">{{ date('h:i a', strtotime($item->{$column->key})) }}</span>
								</div>
								@break

							@case('icon')
								<div class="text-center text-3xl text-body-light-600 border-r border-gray-300 {{ $column->class }}"><i class="fa-duotone {{ $item->{$column->key} ?? $item->fields->{$column->key} }}"></i></div>
								@break

							@case('main')
								@if(!$column->nolink)<a href="{{ route('admin.collections.edit', [$collectionType, $item->id]) }}" class="flex items-center gap-4 border-r border-gray-300 pl-6 {{ $column->class }}">@endif

									<span class="text-base font-extrabold group-hover/row:text-primary-500">
										@if ($item->force_single || !$column->plural)
											{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
										@else
											{{ Str::plural($item->{$column->key}) ?? Str::plural($item->fields->{$column->key}) }}
										@endif
									</span>

									@if(isset($item->protected) && $item->protected == true)
										<i class="fa-duotone fa-lock opacity-50 text-sm"></i>
									@endif
								@if(!$column->nolink)</a>@endif
								@break

							@case('text')
								<div class="line-clamp-2 border-r border-gray-300 {{ $column->class }}">
									{{ $item->{$column->key} ?? $item->fields->{$column->key} }}
								</div>
								@break

							@case('actions')
								<x-acomponents::collection-actions :item="$item" :collectionType="$collectionType" :actions="$column->actions" />
								@break

							@default
								<div class="border-r border-gray-300 {{ $column->class }}">{{ $item->{$column->key} ?? $item->fields->{$column->key} }}</div>
						@endswitch
					@endforeach

				</div>
			@endif
		@endforeach

	@else
			<x-acomponents::goose-egg />
	@endif

</div>