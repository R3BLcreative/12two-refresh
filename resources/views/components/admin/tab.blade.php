@props([
	'href',
	'expanded',
])

<li class="">
	<a href="{{ $href }}" class="block rounded-t-lg px-5 py-2 font-semibold bg-surface-dark text-white opacity-50 hover:opacity-75 aria-expanded:opacity-100 aria-expanded:hover:bg-surface-dark aria-expanded:hover:text-white" aria-expanded="{{ $expanded }}">
		{{ $slot }}
	</a>
</li>