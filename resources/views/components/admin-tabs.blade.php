@props(['tabs'])

<ul class="flex flex-row items-start gap-6 px-8 pt-10 bg-surface-light shadow-inner-bottom" role="navigation">
	@foreach ($tabs as $tab)
		<x-components::admin-tab :expanded="$tab['expanded']" :href="$tab['href']">
			{{ $tab['label'] }}
		</x-components::admin-tab>
	@endforeach
</ul>