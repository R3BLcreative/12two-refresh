@props(['id', 'item' => NULL, 'count' => 1])

<li class="col-span-full">
	<div class="grid grid-cols-[25px_auto_100px] gap-6 items-center odd:bg-surface-light even:bg-surface-light-600 py-2 px-4 group border border-gray-300 rounded">
		<div class="handle cursor-move">
			<i class="fa-solid fa-grip-dots-vertical"></i>
		</div>

		<div class="item-header flex items-center gap-4">
			<span class="item-label uppercase font-semibold"></span>
			<span class="item-type uppercase italic text-xs font-medium"></span>
		</div>

		<div class="flex items-center justify-end gap-4">
			{{-- TOGGLE --}}
			<button type="button" aria-label="Toggle form for this item" aria-expanded="{{ ($count == 1) ? 'true' : 'false' }}" aria-controls="field_{{ $id }}_settings" class="toggle-field-settings group/btn pr-4">
				<i class="fa-solid fa-gear text-3xl transition-all ease-in-out duration-200 group-aria-expanded/btn:-rotate-180"></i>
			</button>

			{{-- MINUS --}}
			<button type="button" aria-label="Remove this field item" class="remove-field-item hover:text-primary @if($count < 2) group-first:hidden @endif">
				<i class="fa-duotone fa-circle-minus text-3xl"></i>
			</button>

			{{-- PLUS --}}
			<button type="button" aria-label="Add new field item" class="add-field-item hover:text-primary">
				<i class="fa-duotone fa-circle-plus text-3xl"></i>
			</button>
		</div>
	</div>

	{{-- FIELD SETTINGS --}}
	<div id="field_{{ $id }}_settings" aria-expanded="{{ ($count == 1) ? 'true' : 'false' }}" class="field-settings col-span-full bg-white transition-all ease-in-out duration-200 max-h-0 overflow-hidden aria-expanded:max-h-[1000px]">
		<div class="border-b border-x rounded-b border-gray-300 p-8 grid grid-cols-8 gap-7 mx-2">
			<x-afields::string
				id="label"
				label="Field Label"
				class="field-label col-span-3"
				name="form_fields[{{ $id }}][label]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="Label"
				desc="Field slug will be created based on what is entered here."
				value="{{ $item->label ?? '' }}" />

			<x-afields::select
				id="type"
				label="Field Type"
				class="field-type col-span-3"
				name="form_fields[{{ $id }}][type]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="Select one..."
				value="{{ $item->type ?? '' }}"
				:options="$fieldTypes['options']" />

			<x-afields::string
				id="class"
				label="Field Class"
				class="col-span-2"
				name="form_fields[{{ $id }}][class]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="text-center uppercase italic..."
				value="{{ $item->class ?? '' }}" />
		</div>
	</div>
</li>