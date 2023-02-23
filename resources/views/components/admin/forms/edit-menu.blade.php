@props([
	'id',
	'action',
	'method',
	'btnStyle',
	'btnText',
	'btnIcon',
	'menu',
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
		value="{{ $menu->title ?? old('title') }}"
		required="1" />

	<x-afields::section
		label="Menu Builder"
		desc="Manage this menu's navigation elements below" />

	@if($errors->any())
		<ul class="list-disc col-span-full w-full ml-8">
			@foreach($errors->all() as $error)
				<li><x-afields::error>{{ $error }}</x-afields::error></li>
			@endforeach
		</ul>
	@enderror

	{{-- MENU BUILDER --}}
	<div class="col-span-full">
		<div class="grid grid-cols-[25px_150px_125px_200px_auto_100px] gap-6 items-center py-2 px-4 bg-surface-dark text-body-light-50 uppercase font-bold">
			<span></span>

			<span>label</span>

			<span>target</span>

			<span>links to</span>

			<span>URL</span>

			<span></span>
		</div>


		<ul id="menu-builder" class="w-full">
			@if(count($menu->items) > 0)
				@foreach($menu->items as $key => $item)
					<x-afields::menu-builder-list :id="$key" :item="$item" :count="count($menu->items)" />
				@endforeach
			@else
				<x-afields::menu-builder-list id="1" />
			@endif
		</ul>
	</div>

	<div class="col-span-full flex justify-end">
		<x-acomponents::button tag="submit" :style="$btnStyle" :icon="$btnIcon">
			{!! $btnText !!}
		</x-acomponents::button>
	</div>
</form>