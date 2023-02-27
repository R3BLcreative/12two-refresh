<div class="flex items-center justify-between gap-3">
	<label
		for="{{ $id }}"
		class="{{ $class ?? '' }} whitespace-nowrap @error($id) text-error font-bold @else text-body-dark-400 font-semibold @enderror">

		{{ $slot }}

		@if($required === true)<span class="text-primary font-black"> *</span>@endif
	</label>

	@error($id)
		<x-afields::error>{!! $message !!}</x-afields::error>
	@enderror
</div>