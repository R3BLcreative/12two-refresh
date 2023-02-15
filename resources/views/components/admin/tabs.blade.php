@props(['tabs'])

<ul class="flex flex-row items-end gap-6 px-8 pt-3 bg-surface-light relative z-99" role="navigation">
	@foreach ($tabs as $tab)
		<x-acomponents::tab :expanded="$tab['expanded']" :href="$tab['href']">
			{{ $tab['label'] }}
		</x-acomponents::tab>
	@endforeach
</ul>