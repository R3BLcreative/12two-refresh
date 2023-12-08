@props(['index', 'item' => NULL, 'count' => 1])

<li class="col-span-full grid grid-cols-[25px_150px_125px_200px_auto_100px] gap-6 items-center odd:bg-surface-light even:bg-surface-light-600 py-2 px-4 group">
	<div class="handle cursor-move">
		<i class="fa-solid fa-grip-dots-vertical"></i>
	</div>

	<x-admin.fields.input
		id="label"
		name="menu_items[{{ $index }}][label]"
		class=""
		placeholder="Label"
		value="{{ $item->label ?? '' }}" />

	@php
		$target = (isset($item->target) && $item->target === true) ? '1' : '0';
	@endphp
	<x-admin.fields.select
		id="target"
		name="menu_items[{{ $index }}][target]"
		class=""
		placeholder="Target"
		value="{{ $target ?? '' }}"
		:options="[
			'0' => 'Self',
			'1' => 'Blank'
		]" />

	<x-admin.fields.select
		type="collections"
		id="link"
		name="menu_items[{{ $index }}][link]"
		class="link-select"
		placeholder="Links to..."
		value="{{ $item->type ?? '' }}" />

	<div class="url-field">
		<input
			id="url"
			name="menu_items[{{ $index }}][url]"
			@if(isset($item->type) && $item->type != 'custom') type="hidden" @else type="text" @endif
			value="{{ $item->link ?? '' }}"
			placeholder="URL"
			class="w-full" />
		<span>@if(isset($item->type) && $item->type != 'custom') {{ $item->link }} @endif</span>
	</div>

	<div class="flex items-center justify-end gap-4">
		<button type="button" aria-label="Remove this menu item" class="remove-menu-item hover:text-primary @if($count < 2) group-first:hidden @endif">
			<i class="fa-duotone fa-circle-minus text-3xl"></i>
		</button>

		<button type="button" aria-label="Add new menu item" class="add-menu-item hover:text-primary">
			<i class="fa-duotone fa-circle-plus text-3xl"></i>
		</button>
	</div>
</li>