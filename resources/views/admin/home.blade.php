<x-layouts::admin
	:contentTypes="$contentTypes"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $title,
	]">

	<x-slot:main>
		<div class="flex items-center gap-4 px-8 py-6">
			<i class="fa-duotone fa-circle-user text-9xl"></i>
			<x-components::admin-heading tag="h1" style="h1" subtext="Vivamus sagittis lacus vel augue laoreet rutrum faucibus">
				Welcome back, {{ Auth::user()->name }}!
			</x-components::admin-heading>
		</div>
	</x-slot:main>

</x-layouts::admin>