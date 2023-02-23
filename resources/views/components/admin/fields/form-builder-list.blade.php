@props(['id', 'item' => NULL, 'count' => 1])

<li class="field-item col-span-full">
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
			<x-afields::section label="Standard Options" />

			<x-afields::select
				id="type"
				label="Type"
				class="field-type col-span-2"
				name="form_fields[{{ $id }}][type]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="Select a field type"
				value="{{ $item->type ?? '' }}"
				required="1"
				:options="$fieldTypes" />

			<x-afields::string
				id="label"
				label="Label"
				class="field-label col-span-3"
				name="form_fields[{{ $id }}][label]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="Label"
				desc="The text to be used in the label tag."
				value="{{ $item->label ?? '' }}"
				required="1" />

			<x-afields::string
				id="placeholder"
				label="Placeholder"
				class="col-span-3"
				name="form_fields[{{ $id }}][placeholder]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="Descriptive text here..."
				desc="The placeholder text for the empty field."
				value="{{ $item->placeholder ?? '' }}" />

			{{-- These should be toggle buttons --}}
			<x-afields::string
				id="class"
				label="Class"
				class="col-span-2"
				name="form_fields[{{ $id }}][class]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="text-center uppercase italic..."
				desc='Enter valid <a href="https://tailwindcss.com" rel="external noopener nofollow" target="_blank" class="basic-link">Tailwindcss</a> class names here.'
				value="{{ $item->class ?? '' }}" />

			<x-afields::text
				id="desc"
				label="Description Text"
				class="col-span-3"
				name="form_fields[{{ $id }}][desc]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				placeholder="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
				desc="Text describing the field's purpose, allowed values, etc."
				value="{{ $item->desc ?? '' }}" />

			<x-afields::checkbox
				id="forms"
				label="Form Visibility"
				class="col-span-3"
				name="form_fields[{{ $id }}][forms]"
				tabindex="{{ ($count == 1) ? '0' : '-1' }}"
				desc="What form(s) should this field be displayed on."
				value="{{ $item->forms ?? '' }}"
				required="1"
				:options="[
					'create' => 'New/Create Form',
					'edit' => 'Edit/Update Form',
				]" />

			{{-- These should be toggle buttons --}}
			@php
				$rules_desc = 'Validation rules must follow the <a href="https://laravel.com/docs/10.x/validation#available-validation-rules" rel="external noopener nofollow" target="_blank" class="basic-link">Laravel string validation</a> parameters and requirements.';
			@endphp
			<div id="rules_section" class="col-span-full hidden">
				<x-afields::section label="Validation Rules" :desc="$rules_desc" />
			</div>

			<div id="rules_new" class="col-span-4 hidden">
				<x-afields::string
					id="new_rules"
					label="New/Create Rules"
					class="new-rules w-full"
					name="form_fields[{{ $id }}][new_rules]"
					tabindex="{{ ($count == 1) ? '0' : '-1' }}"
					placeholder="required|email|etc"
					desc="Validation rules for the new/create form"
					required="1"
					value="{{ $item->rule ?? '' }}" />
			</div>

			<div id="rules_edit" class="col-span-4 hidden">
				<x-afields::string
					id="edit_rules"
					label="Edit/Update Rules"
					class="edit-rules w-full"
					name="form_fields[{{ $id }}][edit_rules]"
					tabindex="{{ ($count == 1) ? '0' : '-1' }}"
					placeholder="required|email|etc"
					desc="Validation rules for the new/create form"
					required="1"
					value="{{ $item->rule ?? '' }}" />
			</div>

			{{-- <x-afields::section label="Additional Options" desc="Additional options based on the field type." /> --}}
		</div>
	</div>
</li>