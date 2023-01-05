<header class="fixed top-0 z-40 w-full border-b border-b-surface-300 text-body-800" role="banner">
	<section class="!bg-white !py-0">
		<row class="min-h-[90px] max-h-screen !gap-y-0">
			<div class="min-h-[90px] mobile:col-span-3 tablet:col-span-4 laptop:col-span-3 order-1 flex gap-2 items-center">
				{{-- NAV TOGGLE --}}
				<x-components::toggle id="main-nav-toggle" class="mobile:block laptop:hidden mr-3 fill-primary-300 hover:fill-primary-200 active:fill-primary-100 w-6" itemID="#main-nav" type="nav" label="Main Navigation Toggle" controls="Main Navigation" expanded="false" icon="burger" />

				{{-- LOGOS --}}
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					LOGO
				</a>
			</div>

			{{-- MAIN NAV --}}
			<nav id="main-nav" class="transition-all ease-in-out duration-500 flex overflow-hidden mobile:gap-8 mobile:h-0 mobile:col-span-full mobile:flex-col mobile:items-center mobile:order-3 laptop:gap-3 laptop:h-fit laptop:col-span-6 laptop:flex-row laptop:justify-between laptop:order-2" aria-expanded="false" aria-label="Main Navigation">
				<div class="mobile:border-t mobile:border-t-surface-300 laptop:hidden h-px w-full"></div>

				<x-components::main-nav-item route="home" text="Home" />
			</nav>

			{{-- USER NAV --}}
			<nav id="user-nav" class="mobile:col-span-1 mobile:order-2 tablet:col-span-4 laptop:col-span-3 laptop:order-3 justify-self-end">
				<x-components::button tag="a" href="#" style="primary" size="default" text="Login" />
			</nav>
		</row>
	</section>
</header>
<div class="z-10 h-[90px]"></div>