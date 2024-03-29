<header class="fixed top-0 z-40 w-full border-b border-b-surface-300 text-body-800" role="banner">
	<x-sections::section class="!bg-primary-500 !py-0 text-body-50 font-semibold mobile:hidden tablet:block">
		<row class="items-stretch">
			<x-components::socials id="header-social-nav" class="tablet:flex tablet:col-span-4 laptop:col-span-3 !justify-start !items-stretch !gap-4 !py-0" style="text-body-50 py-2 px-3 hover:bg-surface-50 hover:text-primary-500 active:bg-secondary-500 active:text-body-800" />

			<nav id="user-nav" class="tablet:col-span-4 laptop:col-span-9 flex flex-row items-center justify-end gap-8">

				@php
					$extraNavClass = 'flex items-center gap-2 py-2 px-3 hover:bg-surface-50 hover:text-primary-500 active:bg-secondary-500 active:text-body-800 uppercase';
				@endphp

				@auth
					{{-- This should be a dropdown eventually --}}
					<a href="{{ route('dashboard.index') }}" class="{{ $extraNavClass }}">
						<i class="fa-duotone fa-circle-user fa-lg"></i>
						{{ Auth::user()->name }}
					</a>

					{{-- Logout will eventually be part of a dropdown --}}
					<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="{{ $extraNavClass }}">
						<i class="fa-duotone fa-right-from-bracket fa-lg"></i>
						LOGOUT
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
				@endauth
				@guest
					<a href="{{ route('login') }}" class="{{ $extraNavClass }}">
						<i class="fa-duotone fa-right-to-bracket fa-lg"></i>
						LOGIN
					</a>

					<a href="#subscribe" class="{{ $extraNavClass }}">
						<i class="fa-duotone fa-envelope fa-lg"></i>
						SUBSCRIBE
					</a>

					<a href="{{ route('donate.index') }}" class="{{ $extraNavClass }}">
						<span class="flex relative">
							<i class="fa-duotone fa-gift fa-lg animate-ping absolute inline-flex opacity-75"></i>
							<i class="fa-duotone fa-gift fa-lg relative inline-flex"></i>
						</span>
						DONATE
					</a>
				@endguest

			</nav>
		</row>
	</x-sections::section>
	<x-sections::section class="!bg-white !py-0">
		<row class="max-h-screen !gap-y-0">
			<div class="col-span-2 order-1 flex gap-2 items-center">
				{{-- LOGOS --}}
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					<x-components::image id="header-logo" image="logo_header.png" alt="12Two Missions" class="m-2 mobile:max-w-[135px] tablet:max-w-[140px] laptop:max-w-[105px] desktop:max-w-[150px]" loading="" />
				</a>
			</div>

			{{-- MAIN NAV --}}
			<nav id="main-nav" class="flex mobile:flex-col mobile:justify-start mobile:overflow-hidden laptop:flex-row laptop:overflow-visible gap-8 transition-all ease-in-out duration-500 mobile:h-0 mobile:col-span-full mobile:order-3 laptop:h-fit laptop:col-span-10 laptop:order-2 laptop:justify-end" aria-expanded="false" aria-label="Main Navigation">
				<div class="border-b border-surface-100 mb-6 laptop:hidden"></div>

				<ul class="mobile:grid mobile:gap-8 mobile:grid-cols-2 laptop:flex laptop:gap-14 laptop:flex-row laptop:justify-end">
					<x-components::main-nav-item route="12two.index" :items="[
						[
							'route' => '12two.index',
							'text' => 'About Us',
						],
						[
							'route' => '12two.beliefs',
							'text' => 'Our Beliefs',
						],
						[
							'route' => 'faqs.index',
							'text' => 'FAQS',
						]
					]">12Two</x-components::main-nav-item>
					<x-components::main-nav-item route="programs.index" :items="[
						[
							'route' => 'programs.sports',
							'text' => 'Sports Program',
						],
						[
							'route' => 'programs.churches',
							'text' => 'Church Plants',
						],
						[
							'route' => 'programs.ambassadors',
							'text' => 'Leadership Journey',
						]
					]">Programs</x-components::main-nav-item>
					<x-components::main-nav-item route="missions.index" :items="[
						[
							'route' => 'missions.communities',
							'text' => 'Our Communities',
						],
						[
							'route' => 'missions.missionaries',
							'text' => '12Two Missionaries',
						],
						[
							'route' => 'missions.disaster-relief',
							'text' => 'Disaster Relief',
						]
					]">Missions</x-components::main-nav-item>
					<x-components::main-nav-item route="journals.index" :items="[
						[
							'route' => 'journals.news',
							'text' => 'News / Updates',
						],
						[
							'route' => 'journals.blog',
							'text' => 'Our Blog',
						],
						[
							'route' => 'journals.trips',
							'text' => 'Trip Journals',
						]
					]">Journals</x-components::main-nav-item>
				</ul>

				@auth
					{{-- USER NAV HERE --}}
				@endauth
				@guest
					<x-components::button id="login-responsive-button" tag="a" href="{{ route('login') }}" style="primary" class="tablet:hidden" icon="fa-duotone fa-right-to-bracket">Login</x-components::button>

					<x-components::button id="donate-responsive-button" tag="a" href="{{ route('donate.index') }}" style="secondary" class="tablet:hidden" icon="fa-duotone fa-gift">Donate</x-components::button>
				@endguest

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