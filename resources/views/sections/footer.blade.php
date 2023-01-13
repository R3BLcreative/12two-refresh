<footer class="bg-primary-500 text-body-50" role="contentinfo">
	<x-sections::section class="!bg-transparent">
		<row class="items-start !gap-y-9 !gap-x-3">

			<div class="mobile:col-span-full laptop:col-span-3 mobile:row-span-1 laptop:row-span-3 mobile:order-6 laptop:order-1 mobile:w-3/4 tablet:w-1/2 laptop:w-full justify-self-center px-8 flex flex-col gap-5">
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					<x-components::image id="footer-logo" image="logo_footer_12twoWhite.png" alt="12Two Missions" class="" loading="" />
				</a>

				<x-components::socials id="footer-social-nav" class="border-t border-b border-body-50 py-3" style="fill-body-50 hover:opacity-80 active:opacity-100" />

				<nav id="legal-footer-nav">
					<ul class="flex flex-row items-center justify-between text-sm gap-2 text-body-50">
						<x-components::footer-nav-item route="privacy">Privacy</x-components::footer-nav-item>
						<x-components::footer-nav-item route="cookies">Cookies</x-components::footer-nav-item>
						<x-components::footer-nav-item route="terms">Terms</x-components::footer-nav-item>
					</ul>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 mobile:order-2 laptop:order-2">
				<x-components::heading tag="h2" style="h5" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-3">12Two</x-components::heading>

				<nav id="12two-footer-nav">
					<ul class="fa-ul flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50">
						<x-components::footer-nav-item route="12two">About Us</x-components::footer-nav-item>
						<x-components::footer-nav-item route="beliefs">Our Beliefs</x-components::footer-nav-item>
						<x-components::footer-nav-item route="connect">Connect With Us</x-components::footer-nav-item>
					</ul>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 mobile:order-3 laptop:order-3">
				<x-components::heading tag="h2" style="h5" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-3">Programs</x-components::heading>

				<nav id="programs-footer-nav">
					<ul class="fa-ul flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50">
						<x-components::footer-nav-item route="sports">Sports Program</x-components::footer-nav-item>
						<x-components::footer-nav-item route="churches">Church Plants</x-components::footer-nav-item>
						<x-components::footer-nav-item route="ambassadors">Leadership Journey</x-components::footer-nav-item>
					</ul>
				</nav>
			</div>

			<div class="mobile:col-span-full laptop:col-span-3 mobile:row-span-1 laptop:row-span-3 mobile:order-1 laptop:order-4 self-stretch">
				<x-components::anchor id="subscribe" />

				<x-components::heading tag="h2" style="h5" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-3">Join Our List</x-components::heading>

				<p>Subscribe to our mailing list to receive trip notifications, news, and updates.</p>

				<x-forms::subscribe class="grid grid-cols-2 gap-4 rounded-xl bg-body-50 p-6 text-body-800 shadow-lg border-2 border-surface-800" />
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 mobile:order-4 laptop:order-5">
				<x-components::heading tag="h2" style="h5" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-3">Missions</x-components::heading>

				<nav id="missions-footer-nav">
					<ul class="fa-ul flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50">
						<x-components::footer-nav-item route="communities">Our Communities</x-components::footer-nav-item>
						<x-components::footer-nav-item route="missionaries">12Two Missionaries</x-components::footer-nav-item>
						<x-components::footer-nav-item route="disaster-relief">Disaster Relief</x-components::footer-nav-item>
					</ul>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 mobile:order-5 laptop:order-6">
				<x-components::heading tag="h2" style="h5" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-3">Journal</x-components::heading>

				<nav id="journal-footer-nav">
					<ul class="fa-ul flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50">
						<x-components::footer-nav-item route="news">News / Updates</x-components::footer-nav-item>
						<x-components::footer-nav-item route="blog">Blog Posts</x-components::footer-nav-item>
						<x-components::footer-nav-item route="journals.trips">Trip Journals</x-components::footer-nav-item>
					</ul>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 mobile:hidden laptop:order-7">
			</div>
			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 mobile:hidden laptop:order-8"></div>

		</row>
		<row>
			<div class="col-span-full flex mobile:flex-col tablet:flex-row items-center justify-center gap-2 text-sm mt-10 italic">
				<span>&copy; Copyright {{ date('Y') }} 12Two Missions Inc.</span>
				<span class="mobile:hidden tablet:block">|</span>
				<span>All Rights Reserved</span>
				<span class="mobile:hidden tablet:block">|</span>
				<span>Site Developed By R3BL Creative LLC.</span>
			</div>
		</row>
	</x-sections::section>
</footer>