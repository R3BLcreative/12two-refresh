@props([
	'id',
	'required' => '',
])

<label
	for="{{ $id }}"
	class="@error($id) text-error font-bold @else text-body-dark-400 font-semibold @enderror">

	{{ $slot }}

	@if($required)<span class="text-primary font-black"> *</span>@endif
</label>