@aware(['main'])

<body class="bg-surface-light font-body text-body-dark font-normal text-base antialiased relative flex flex-auto w-full">

	{{-- ADMIN NAV BAR --}}
	<x-sections::admin-sidebar />

	<div class="flex flex-col w-full max-h-screen">
		{{-- MAIN HEADER --}}
		<x-sections::admin-header />

		{{-- MAIN CONTENT --}}
		<main id="content" tabindex="-1" role="main" class="flex flex-col flex-auto bg-white relative overflow-hidden">
			{{ $main }}
		</main>

		{{-- FOOTER --}}
		<x-sections::admin-footer />
	</div>

</body>