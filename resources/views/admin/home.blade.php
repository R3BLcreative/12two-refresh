<x-layouts::admin
	:navigation="$navigation"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $title,
	]">

	<x-slot:main>
		<div class="flex items-center gap-4 px-8 py-6">
			<i class="fa-duotone fa-circle-user text-8xl"></i>
			<x-components::admin-heading tag="h1" style="h1" subtext="Vivamus sagittis lacus vel augue laoreet rutrum faucibus">
				Welcome back, {{ Auth::user()->name }}!
			</x-components::admin-heading>
		</div>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden"></div>
	</x-slot:main>

</x-layouts::admin>