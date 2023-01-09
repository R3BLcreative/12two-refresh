<header class="fixed top-0 z-40 w-full border-b border-b-surface-300 text-body-800" role="banner">
	<section class="!bg-primary-500 !py-2 text-body-50 font-semibold mobile:hidden tablet:block">
		<row>
			<x-components::socials id="header-social-nav" class="tablet:flex tablet:col-span-4 laptop:col-span-2 !justify-start !gap-8" style="fill-body-50 hover:opacity-80 active:opacity-100 h-fit" />
			<nav id="user-nav" class="tablet:col-span-4 laptop:col-span-10 flex flex-row items-center justify-end gap-2">

				@auth
					<a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:opacity-80 active:opacity-100" aria-label="Login to your 12Two Account">
						<span class="flex relative">
							<i class="fa-duotone fa-circle-user fa-lg animate-ping absolute inline-flex opacity-75"></i>
							<i class="fa-duotone fa-circle-user fa-lg relative inline-flex"></i>
						</span>
						ACCOUNT
					</a>
				@endauth
				@guest
					<a href="{{ route('login') }}" class="flex items-center gap-2 hover:opacity-80 active:opacity-100" aria-label="Login to your 12Two Account">
						<span class="flex relative">
							<i class="fa-duotone fa-right-to-bracket fa-lg animate-ping absolute inline-flex opacity-75"></i>
							<i class="fa-duotone fa-right-to-bracket fa-lg relative inline-flex"></i>
						</span>
						LOGIN
					</a>
				@endguest

			</nav>
		</row>
	</section>
	<section class="!bg-white !py-0">
		<row class="min-h-[90px] max-h-screen !gap-y-0">
			<div class="min-h-[90px] mobile:col-span-2 tablet:col-span-2 laptop:col-span-2 order-1 flex gap-2 items-center">
				{{-- LOGOS --}}
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					<x-components::image id="header-logo" image="logo_header_12twoBlack.png" alt="12Two Missions" class="py-2 px-2" loading="" />
				</a>
			</div>

			{{-- MAIN NAV --}}
			<nav id="main-nav" class="transition-all ease-in-out duration-500 flex overflow-hidden mobile:gap-8 mobile:h-0 mobile:col-span-full mobile:flex-col mobile:items-center mobile:order-3 laptop:gap-14 laptop:h-fit laptop:col-span-10 laptop:flex-row laptop:justify-end laptop:order-2" aria-expanded="false" aria-label="Main Navigation">
				<div class="mobile:border-t mobile:border-t-surface-300 laptop:hidden h-px w-full"></div>

				<x-components::main-nav-item route="12two" text="12Two" />
				<x-components::main-nav-item route="programs" text="Programs" />
				<x-components::main-nav-item route="missions" text="Missions" />
				<x-components::main-nav-item route="journal" text="Journal" />
			</nav>

			<div class="mobile:col-span-2 tablet:col-span-6 laptop:hidden order-1 flex justify-end items-center">
				{{-- NAV TOGGLE --}}
				<x-components::toggle id="main-nav-toggle" class="mobile:block laptop:hidden fill-body-700 hover:fill-primary-500 active:fill-primary-700 w-6" itemID="#main-nav" type="nav" label="Main Navigation Toggle" controls="Main Navigation" expanded="false" icon="burger" />
			</div>
		</row>
	</section>
</header>
<div class="z-10 h-[90px]"></div>