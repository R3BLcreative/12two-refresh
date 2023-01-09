<footer class="bg-primary-500 text-body-50" role="contentinfo">
	<section class="!bg-transparent">
		<row class="items-start !gap-y-9 !gap-x-3">

			<div class="mobile:col-span-full tablet:col-span-full laptop:col-span-3 row-span-2 px-8 flex flex-col gap-5">
				<a href="{{ route('home') }}" class="" aria-label="Return to homepage">
					<x-components::image id="footer-logo" image="logo_footer_12twoWhite.png" alt="12Two Missions" class="" loading="" />
				</a>

				<x-components::socials id="footer-social-nav" class="border-t border-b border-body-50 py-3" />

				<nav id="legal-footer-nav" class="flex flex-row items-center justify-between text-sm gap-3 text-body-50">
					<a href="#">Privacy</a>
					<a href="#">Cookies</a>
					<a href="#">Terms</a>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
				<x-components::heading tag="h2" style="h4" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-5" text="12Two" />

				<nav id="12two-footer-nav" class="flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50 pl-8">
					<a href="#">About Us</a>
					<a href="#">Our Beliefs</a>
					<a href="#">Connect</a>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
				<x-components::heading tag="h2" style="h4" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-5" text="Programs" />

				<nav id="programs-footer-nav" class="flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50 pl-8">
					<a href="#">Sports</a>
					<a href="#">Churches</a>
					<a href="#">Ambassadors</a>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3 row-span-2 self-stretch rounded-md border-2 border-body-50 p-6">
				SUBSCRIBE TO LIST
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
				<x-components::heading tag="h2" style="h4" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-5" text="Missions" />

				<nav id="missions-footer-nav" class="flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50 pl-8">
					<a href="#">Communities</a>
					<a href="#">Missionaries</a>
					<a href="#">Disaster Relief</a>
				</nav>
			</div>

			<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
				<x-components::heading tag="h2" style="h4" class="!text-body-50 border-l-secondary-300 !text-2xl !tracking-widest py-1 block border-l-8 pl-5" text="Journal" />

				<nav id="journal-footer-nav" class="flex flex-col items-start justify-start text-lg gap-3 tracking-wider text-body-50 pl-8">
					<a href="#">News</a>
					<a href="#">Blog</a>
					<a href="#">Trips</a>
				</nav>
			</div>

		</row>
		<row>
			<div class="col-span-full flex items-center justify-center gap-2 text-sm mt-10 italic">
				<span>&copy; Copyright {{ date('Y') }} 12Two Missions Inc.</span>
				<span>|</span>
				<span>All Rights Reserved</span>
				<span>|</span>
				<span>Site Developed By R3BL Creative LLC.</span>
			</div>
		</row>
	</section>
</footer>