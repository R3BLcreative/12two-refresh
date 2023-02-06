@props([
	'href',
	'expanded',
])

<li class="">
	<a href="{{ $href }}" class="block rounded-t-lg px-5 py-2 font-semibold bg-surface-dark text-white hover:bg-surface-dark-400 aria-expanded:bg-white aria-expanded:text-body-dark aria-expanded:border-x aria-expanded:border-t aria-expanded:border-gray-200 aria-expanded:shadow" aria-expanded="{{ $expanded }}">
		{{ $slot }}
	</a>
</li>