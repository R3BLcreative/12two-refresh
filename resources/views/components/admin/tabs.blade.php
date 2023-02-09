@props(['tabs'])

<ul class="flex flex-row items-start gap-6 px-8 pt-10 bg-surface-light shadow-inner-bottom" role="navigation">
	@foreach ($tabs as $tab)
		<x-acomponents::tab :expanded="$tab['expanded']" :href="$tab['href']">
			{{ $tab['label'] }}
		</x-acomponents::tab>
	@endforeach
</ul>