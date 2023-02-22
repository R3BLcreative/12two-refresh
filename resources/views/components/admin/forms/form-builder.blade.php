@props([
	'id',
	'action',
	'method',
	'item',
	'collectionType',
	'btnStyle',
	'btnText',
	'btnIcon'
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

	<x-afields::section
		label="Form Fields"
		desc="" />

	@if($errors->any())
		<ul class="list-disc col-span-full w-full ml-8">
			@foreach($errors->all() as $error)
				<li><x-afields::error>{{ $error }}</x-afields::error></li>
			@endforeach
		</ul>
	@enderror

	{{-- FORM BUILDER --}}
	<div class="col-span-full">
		<ul id="form-builder" class="w-full flex flex-col gap-4">
			<x-afields::form-builder-list id="1" />
		</ul>
	</div>

	<div class="col-span-full flex justify-end">
		<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
			{!! $btnText !!}
		</x-acomponents::button>
	</div>
</form>