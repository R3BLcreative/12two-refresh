<header class="fixed top-0 z-40 w-full border-b border-b-surface-300 text-body-800" role="banner">
	<section class="!bg-primary-500 !py-2 text-body-50 font-semibold mobile:hidden tablet:block">
		<row>
			<x-components::socials id="header-social-nav" class="tablet:flex tablet:col-span-4 laptop:col-span-2 !justify-start !gap-10" style="fill-body-50 hover:opacity-80 active:opacity-100 h-fit" />
			<nav id="user-nav" class="tablet:col-span-4 laptop:col-span-10 flex flex-row items-center justify-end gap-8">

				@auth
					<a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:opacity-80 active:opacity-100" aria-label="Login to your 12Two Account">
						<i class="fa-duotone fa-circle-user fa-lg"></i>
						ACCOUNT
					</a>
				@endauth
				@guest
					<a href="{{ route('login') }}" class="flex items-center gap-2 hover:opacity-80 active:opacity-100" aria-label="Login to your 12Two Account">
						<i class="fa-duotone fa-right-to-bracket fa-lg"></i>
						LOGIN
					</a>
				@endguest

				<a href="{{ route('donate') }}" class="flex items-center gap-2 hover:opacity-80 active:opacity-100" aria-label="Make a Donation">
					<span class="flex relative">
						<i class="fa-duotone fa-gift fa-lg animate-ping absolute inline-flex opacity-75"></i>
						<i class="fa-duotone fa-gift fa-lg relative inline-flex"></i>
					</span>
					DONATE
				</a>

			</nav>
		</row>
	</section>
	<section class="!bg-white !py-0">
		<row class="max-h-screen !gap-y-0">
			<div class="col-span-2 order-1 flex gap-2 items-center">
				{{-- LOGOS --}}
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					<x-components::image id="header-logo" image="logo_header_12twoBlack.png" alt="12Two Missions" class="m-2" loading="" />
				</a>
			</div>

			{{-- MAIN NAV --}}
			<nav id="main-nav" class="flex mobile:flex-col mobile:justify-start mobile:overflow-hidden laptop:flex-row laptop:overflow-visible gap-8 transition-all ease-in-out duration-500 mobile:h-0 mobile:col-span-full mobile:order-3 laptop:h-fit laptop:col-span-10 laptop:order-2 laptop:justify-end" aria-expanded="false" aria-label="Main Navigation">
				<div class="border-b border-surface-100 mb-6 laptop:hidden"></div>

				<ul class="mobile:grid mobile:gap-8 mobile:grid-cols-2 laptop:flex laptop:gap-14 laptop:flex-row laptop:justify-end">
					<x-components::main-nav-item route="12two" text="12Two" :items="[
						[
							'route' => '12two',
							'text' => 'About Us',
						],
						[
							'route' => 'beliefs',
							'text' => 'Our Beliefs',
						],
						[
							'route' => 'connect',
							'text' => 'Connect With Us',
						]
					]" />
					<x-components::main-nav-item route="programs" text="Programs" :items="[
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
					]" />
					<x-components::main-nav-item route="missions" text="Missions" :items="[
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
					]" />
					<x-components::main-nav-item route="journals" text="Journals" :items="[
						[
							'route' => 'news',
							'text' => 'News / Updates',
						],
						[
							'route' => 'blog',
							'text' => 'Blog Posts',
						],
						[
							'route' => 'journals.trips',
							'text' => 'Trip Journals',
						]
					]" />
				</ul>

				<x-components::button id="login-responsive-button" tag="a" href="{{ route('login') }}" style="primary" text="Login" class="tablet:hidden" icon="fa-duotone fa-right-to-bracket" />

				<x-components::button id="donate-responsive-button" tag="a" href="{{ route('donate') }}" style="secondary" text="Donate" class="tablet:hidden" icon="fa-duotone fa-gift" />

				<x-components::socials id="header-responsive-social-nav" class="mobile:flex tablet:hidden !justify-center gap-10" style="text-body-800 hover:text-primary-500 active:text-primary-700 h-fit" />
			</nav>

			<div class="mobile:col-span-2 tablet:col-span-6 laptop:hidden order-2 flex justify-end items-center">
				{{-- NAV TOGGLE --}}
				<x-components::toggle id="main-nav-toggle" class="mobile:block laptop:hidden text-black hover:text-primary-500 active:text-primary-700 w-6" itemID="#main-nav" type="nav" label="Main Navigation Toggle" controls="Main Navigation" expanded="false" icon="fa-light fa-bars fa-2xl" />
			</div>
		</row>
	</section>
</header>
<div class="z-10 h-[154px]"></div>