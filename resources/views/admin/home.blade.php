<x-layouts::admin :title="$title">

	<x-slot:main>
		<div class="flex items-center gap-4 px-8 py-6">
			<i class="fa-duotone fa-circle-user text-8xl"></i>
			<x-acomponents::heading tag="h1" style="h1" subtext="Here's the latest details of what has happened while you were away.">
				Welcome back, {{ Auth::user()->name }}!
			</x-acomponents::heading>
		</div>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden"></div>
	</x-slot:main>

</x-layouts::admin>