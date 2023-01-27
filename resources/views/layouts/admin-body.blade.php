@aware(['main', 'contentTypes'])

<body {{ $attributes->merge(['class' => 'bg-surface-light font-body text-body-dark font-normal text-base text-gray-900 antialiased relative flex flex-auto w-full']) }}>

	{{-- ADMIN NAV BAR --}}
	<x-sections::admin-sidebar />

	<div class="flex flex-col flex-auto w-full min-w-0">
		{{-- MAIN HEADER --}}
		<x-sections::admin-header />

		{{-- MAIN CONTENT --}}
		<main id="content" tabindex="-1" role="main" class="flex flex-col flex-auto items-start justify-start px-8 py-6 bg-white">
			{{ $main }}
		</main>

		{{-- FOOTER --}}
		<x-sections::admin-footer />
	</div>

</body>