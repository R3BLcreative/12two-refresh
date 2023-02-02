@props([
	'id',
	'required'
])

<label
	for="{{ $id }}"
	class="text-lg @error($id) text-error font-bold @else font-semibold @enderror">

	{{ $slot }}

	@if($required)<span class="text-primary font-black"> *</span>@endif
</label>