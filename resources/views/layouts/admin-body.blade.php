@aware(['main'])

<body class="bg-surface-light font-body text-body-dark font-normal text-base antialiased relative flex flex-auto w-full">

	{{-- ADMIN NAV BAR --}}
	<x-asections::sidebar />

	<div class="flex flex-col w-full max-h-screen">
		{{-- MAIN HEADER --}}
		<x-asections::header />

		{{-- MAIN CONTENT --}}
		<main id="content" tabindex="-1" role="main" class="flex flex-col flex-auto bg-white relative overflow-hidden">
			{{ $main }}
		</main>

		{{-- FOOTER --}}
		<x-asections::footer />
	</div>

</body>