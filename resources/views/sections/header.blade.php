<header class="fixed top-0 z-40 w-full border-b border-b-surface-300 text-body-800" role="banner">
	<x-sections::section class="!bg-primary-500 !py-0 text-body-50 font-semibold mobile:hidden tablet:block">
		<row class="items-stretch">
			<x-components::socials id="header-social-nav" class="tablet:flex tablet:col-span-4 laptop:col-span-3 !justify-start !items-stretch !gap-4 !py-0" style="text-body-50 py-2 px-3 hover:bg-surface-50 hover:text-primary-500 active:bg-secondary-500 active:text-body-800" />

			<nav id="user-nav" class="tablet:col-span-4 laptop:col-span-9 flex flex-row items-center justify-end gap-8">

				@auth
					<a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 hover:opacity-80 active:opacity-100" aria-label="Login to your 12Two Account">
						<i class="fa-duotone fa-circle-user fa-lg"></i>
						ACCOUNT
					</a>
				@endauth
				@guest
					<a href="{{ route('login') }}" class="flex items-center gap-2 py-2 px-3 hover:bg-surface-50 hover:text-primary-500 active:bg-secondary-500 active:text-body-800" aria-label="Login to your 12Two Account">
						<i class="fa-duotone fa-right-to-bracket fa-lg"></i>
						LOGIN
					</a>
				@endguest

				<a href="#subscribe" class="flex items-center gap-2 py-2 px-3 hover:bg-surface-50 hover:text-primary-500 active:bg-secondary-500 active:text-body-800" aria-label="Make a Donation">
					<i class="fa-duotone fa-envelope fa-lg"></i>
					SUBSCRIBE
				</a>

				<a href="{{ route('donate') }}" class="flex items-center gap-2 py-2 px-3 hover:bg-surface-50 hover:text-primary-500 active:bg-secondary-500 active:text-body-800" aria-label="Make a Donation">
					<span class="flex relative">
						<i class="fa-duotone fa-gift fa-lg animate-ping absolute inline-flex opacity-75"></i>
						<i class="fa-duotone fa-gift fa-lg relative inline-flex"></i>
					</span>
					DONATE
				</a>

			</nav>
		</row>
	</x-sections::section>
	<x-sections::section class="!bg-white !py-0">
		<row class="max-h-screen !gap-y-0">
			<div class="col-span-2 order-1 flex gap-2 items-center">
				{{-- LOGOS --}}
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					<x-components::image id="header-logo" image="logo_header_12twoBlack.png" alt="12Two Missions" class="m-2 mobile:max-w-[135px] tablet:max-w-[140px] laptop:max-w-[105px] desktop:max-w-[150px]" loading="" />
				</a>
			</div>

			{{-- MAIN NAV --}}
			<nav id="main-nav" class="flex mobile:flex-col mobile:justify-start mobile:overflow-hidden laptop:flex-row laptop:overflow-visible gap-8 transition-all ease-in-out duration-500 mobile:h-0 mobile:col-span-full mobile:order-3 laptop:h-fit laptop:col-span-10 laptop:order-2 laptop:justify-end" aria-expanded="false" aria-label="Main Navigation">
				<div class="border-b border-surface-100 mb-6 laptop:hidden"></div>

				<ul class="mobile:grid mobile:gap-8 mobile:grid-cols-2 laptop:flex laptop:gap-14 laptop:flex-row laptop:justify-end">
					<x-components::main-nav-item route="12two" :items="[
						[
							'route' => '12two',
							'text' => 'About Us',
						],
						[
							'route' => 'beliefs',
							'text' => 'Our Beliefs',
						],
						[
							'route' => 'faqs',
							'text' => 'FAQS',
						]
					]">12Two</x-components::main-nav-item>
					<x-components::main-nav-item route="programs" :items="[
						[
							'route' => 'sports',
							'text' => 'Sports Program',
						],
						[
							'route' => 'churches',
							'text' => 'Church Plants',
						],
						[
							'route' => 'ambassadors',
							'text' => 'Leadership Journey',
						]
					]">Programs</x-components::main-nav-item>
					<x-components::main-nav-item route="missions" :items="[
						[
							'route' => 'communities',
							'text' => 'Our Communities',
						],
						[
							'route' => 'missionaries',
							'text' => '12Two Missionaries',
						],
						[
							'route' => 'disaster-relief',
							'text' => 'Disaster Relief',
						]
					]">Missions</x-components::main-nav-item>
					<x-components::main-nav-item route="journals" :items="[
						[
							'route' => 'news',
							'text' => 'News / Updates',
						],
						[
							'route' => 'blog',
							'text' => 'Our Blog',
						],
						[
							'route' => 'journals.trips',
							'text' => 'Trip Journals',
						]
					]">Journals</x-components::main-nav-item>
				</ul>

				<x-components::button id="login-responsive-button" tag="a" href="{{ route('login') }}" style="primary" class="tablet:hidden" icon="fa-duotone fa-right-to-bracket">Login</x-components::button>

				<x-components::button id="donate-responsive-button" tag="a" href="{{ route('donate') }}" style="secondary" class="tablet:hidden" icon="fa-duotone fa-gift">Donate</x-components::button>

				<x-components::socials id="header-responsive-social-nav" class="mobile:flex tablet:hidden !justify-center gap-10" style="text-body-800 hover:text-primary-500 active:text-primary-700 h-fit" />
			</nav>

			<div class="mobile:col-span-2 tablet:col-span-6 laptop:hidden order-2 flex justify-end items-center">
				{{-- NAV TOGGLE --}}
				<x-components::toggle id="main-nav-toggle" class="mobile:block laptop:hidden text-black hover:text-primary-500 active:text-primary-700 w-6" itemID="#main-nav" type="nav" label="Main Navigation Toggle" controls="Main Navigation" expanded="false" icon="fa-light fa-bars fa-2xl" />
			</div>
		</row>
	</x-sections::section>
</header>
<div class="z-10 mobile:h-[97px] tablet:h-[144px] laptop:h-[123px] desktop:h-[150px]"></div>