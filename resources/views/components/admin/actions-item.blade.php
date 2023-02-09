@props(['icon', 'onclick' => ''])

<button class="text-center group/menu relative" onclick="{{ $onclick }}">
	<i class="fa-duotone {{ $icon }} text-3xl transition-all ease-in-out text-body-light-200 group-hover/menu:text-body-dark-300 group-active/menu:text-body-dark"></i>

	<div class="overflow-hidden absolute bg-surface-dark top-4 right-4 rounded-tl-md rounded-br-md shadow transition-all duration-300 ease-in-out min-w-0 max-w-0 max-h-0 flex group-hover/menu:max-w-[500px] group-hover/menu:max-h-[1000px] z-99 items-center text-white">
		{{ $slot }}
	</div>
</button>