@aware(['main'])

<body {{ $attributes->merge(['class' => 'bg-surface-800 font-body font-medium mobile:text-sm laptop:text-base text-body-50 antialiased leading-10 tracking-wide']) }}>

	<x-components::button id="skip-to-main" tag="button" style="none" size="none" class="block h-none w-none fixed top-3 overflow-hidden font-semibold bg-primary-500 text-body-50 rounded-md px-8 -z-40 focus:h-fit focus:w-fit focus:z-[9999]" :atts="['tabindex' => '0']" text="Skip to main content" />

	{{-- HEADER --}}
	<x-sections::header />

	{{-- MAIN CONTENT --}}
	<main id="content" tabindex="-1" role="main" class="w-full relative z-10">
		{{ $main }}
	</main>

	{{-- FOOTER --}}
	<x-sections::footer />

	{{-- COOKIE CONSENT --}}
	<x-components::cookie-consent />

</body>