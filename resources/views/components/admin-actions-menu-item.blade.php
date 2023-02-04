@props(['route', 'click'])

<li class="w-full text-left py-2 px-4 font-semibold hover:bg-primary group/menu">
	<a href="{{ $route ?? '#' }}" class="block w-full" onclick="{{ $click ?? '' }}">
		{{ $slot }}
	</a>
</li>