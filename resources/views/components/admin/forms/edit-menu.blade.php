@props([
	'id',
	'action',
	'method',
	'btnStyle',
	'btnText',
	'btnIcon',
	'item',
])

<form
	action="{{ $action }}"
	method="post"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8 border-t border-gray-300"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method($method)

	<x-afields::string
		id="title"
		label="Menu Title"
		placeholder="Some Title"
		value="{{ $item->title ?? old('title') }}"
		required="1" />

	{{-- MENU BUILDER HERE --}}
	<div class="col-span-full grid grid-cols-[300px_auto] gap-6">
		{{-- COLLECTIONS --}}
		<div class="flex flex-col gap-6">
			@foreach($collectionTypes as $collectionType)
				<div class="group" aria-expanded="false">

					{{-- BUTTON/HEADING --}}
					<button id="{{ $collectionType->slug }}" type="button" class="menu-builder-option-toggle text-base bg-gray-200 rounded text-body-dark-300 font-black tracking-wider py-2 px-2 uppercase flex items-center justify-between gap-6 !w-full">
						{{ ($collectionType->force_single) ? $collectionType->label : Str::plural($collectionType->label) }}

						<i class="fa-solid fa-chevron-up opacity-50 transition-all group-aria-expanded:-rotate-180"></i>
					</button>

					{{-- OPTIONS --}}
					<div class="transition-all max-h-0 overflow-hidden group-aria-expanded:max-h-[400px]">
						<ul aria-labelledby="{{ $collectionType->slug }}" class="sortable-options border-x border-b border-gray-200 rounded-b">
							@for ($x = 5; $x > 0; $x--)
								<li id="item-{{ $x }}" class="w-full text-left px-6 py-3 font-medium cursor-move hover:bg-surface-light-500" tabindex="-1">
									Test {{ $x }}
									<input name="item-{{ $x }}" type="hidden" value="" />
								</li>
							@endfor
						</ul>
					</div>
				</div>
			@endforeach
		</div>

		{{-- MENU BUILDER - DROPZONE --}}
		<div class="border border-gray-300 rounded min-h-[300px]">
			<ul id="menu-builder" class="w-full h-full">
			</ul>
		</div>
	</div>

	<div class="col-span-full flex justify-end">
		<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
			{!! $btnText !!}
		</x-acomponents::button>
	</div>
</form>