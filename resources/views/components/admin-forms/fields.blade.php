@props([
	'id',
	'action',
	'method',
	'btnStyle',
	'btnText',
	'btnIcon'
])

<form
	action="{{ $action }}"
	method="{{ $method }}"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method($method)

	<x-admin-fields::integer id="order" label="Order" value="" placeholder="" desc="" required="1" class="" />

	<x-admin-fields::string id="type" label="Type" value="" placeholder="" desc="" required="1" class="" />

	<x-admin-fields::string id="class" label="Class" value="" placeholder="" desc="" required="" class="" />

	<x-admin-fields::string id="id" label="ID" value="" placeholder="" desc="" required="1" class="" />

	<x-admin-fields::string id="key" label="Key" value="" placeholder="" desc="" required="1" class="" />

	<x-admin-fields::string id="label" label="Label" value="" placeholder="" desc="" required="1" class="" />

	<x-admin-fields::string id="palceholder" label="Placeholder" value="" placeholder="" desc="" required="" class="" />

	<x-admin-fields::text id="desc" label="Description" value="" placeholder="" desc="" required="" class="" />

	<x-admin-fields::string id="required" label="Required" value="" placeholder="" desc="" required="1" class="" />

	<x-admin-fields::string id="validate" label="Validate" value="" placeholder="" desc="" required="" class="" />

	<x-components::admin-button tag="submit" :style="$btnStyle" :icon="$btnIcon">
		{!! $btnText !!}
	</x-components::admin-button>
</form>