@props([
	'id',
	'action',
	'method',
	'btnStyle',
	'btnText',
	'btnIcon',
])

<form
	action="{{ $action }}"
	method="post"
	class="grid grid-cols-[85px_auto_150px] items-center gap-4 overflow-auto overscroll-contain px-8 pt-4 pb-8 bg-surface-light"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method($method)

	<x-afields::label id="title" class="col-span-1 !font-extrabold" :required="false">NEW MENU:</x-afields::label>

	<x-admin.fields.input
		id="title"
		placeholder="Menu Title"
		value="{{ old('title') }}"
		required="1"
		class="col-span-1" />

	<div class="col-span-1 flex items-center justify-center">
		<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon" class="">
			{!! $btnText !!}
		</x-acomponents::button>
	</div>
</form>