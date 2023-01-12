<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Donate',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::hero preheader="Become a financial partner" title="None of us is as strong as all of us" image="" alt="">
			<x-slot:body>
				<p>We are a 501c3 nonprofit organization that depends on gifts and donations to operate. What you give today will help us help millions of lives experience the transformative power of an authentic encounter with Jesus. Check out our <x-components::link href="{{ route('faq.category', ['cat' => 'donations']) }}">FAQ page</x-components::link> for answers to common questions regarding donations to 12Two Missions.</p>
			</x-slot:body>

			<x-slot:ctas class="flex flex-row gap-6">
				<x-components::button tag="a" style="secondary" href="#donation-form">Donate Today</x-components::button>
				<x-components::button tag="a" style="accent" href="{{ route('faq.category', ['cat' => 'donations']) }}">
					Donations FAQ
				</x-components::button>
			</x-slot:ctas>
		</x-sections::hero>

		<x-sections::section>
			<row>
				<div class="col-span-full flex mobile:flex-col tablet:flex-row justify-start items-start gap-6">
					<x-components::heading tag="h2" style="h2">By The Numbers</x-components::heading>
					<p>Since 2015, the generosity of our financial partners has made waves throughout His Kingdom in ways that can not be measured. We never want this ministry to be driven by <em>"numbers"</em> or <em>"statistics"</em> because a these tertiary items can not reflect the impact of a single life transformed. However, the implication of that impact can be preceived through numbers and statistics. <strong>Jesus transformed thousands of lives with 2 fish and 5 loaves.</strong> Imagine the implications of what He has done with the following.</p>
				</div>

				@php
					$wrapper = 'flex flex-col gap-3 items-center justify-stretch';
					$iconc = 'mobile:text-7xl tablet:text-8xl mb-4';
					$icons ='--fa-primary-color: #58AB27; --fa-secondary-color: #58AB27;';
					$counter = 'mobile:text-5xl tablet:text-7xl font-black text-primary-200 drop-shadow-sm';
					$textc = 'uppercase mobile:text-base tablet:text-xl font-bold text-center';
				@endphp
				{{-- TRIPS LEAD --}}
				<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
					<x-components::counter speed="600" value="140" wrapper="{{  $wrapper }}" text="Trips Lead" icon="fa-duotone fa-route" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" icons="{{ $icons }}" after="+" afterc="{{ $counter }}" />
				</div>

				{{-- COMMUNITIES --}}
				<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
					<x-components::counter speed="10000" value="15" wrapper="{{ $wrapper }}" text="Communities Helped" icon="fa-duotone fa-earth-americas" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" icons="{{ $icons }}" />
				</div>

				{{-- DONATIONS --}}
				<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
					<x-components::counter speed="600" value="290" wrapper="{{ $wrapper }}" text="Raised" icon="fa-duotone fa-hands-holding-dollar" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" after="K" afterc="{{ $counter }}" before="$" beforec="{{ $counter }}" icons="{{ $icons }}" />
				</div>

				{{-- LIVES TRANSFORMED --}}
				<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
					<x-components::counter speed="400" value="2160" wrapper="{{ $wrapper }}" text="Lives Transformed" icon="fa-duotone fa-arrows-maximize" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" after="+" afterc="{{ $counter }}" icons="{{ $icons }}" />
				</div>
			</row>
		</x-sections::section>

		{{-- WAYS TO DONATE --}}
		<x-sections::section>
			<row>
				<x-components::heading tag="h2" style="h2" class="col-span-full text-center">Ways to Donate</x-components::heading>
			</row>
			<row class="!items-start !justify-stretch">
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4">
					<x-components::heading tag="h3" style="h3" class="text-center">Online</x-components::heading>
					<p class="text-center">This is the fastest way to send us money. Your payment will be processed securely using PayPal. A PayPal account is not required. Simply fill out the form below and follow the prompts.</p>
				</div>
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4">
					<x-components::heading tag="h3" style="h3" class="text-center">Facebook</x-components::heading>
					<p class="text-center">Donating through Facebook ensures that 100% of your gift comes to 12Two. Click the link below and then click the <em>"Donate"</em> button on the 12Two Facebook Page.</p>
				</div>
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-4">
					<x-components::heading tag="h3" style="h3" class="text-center">Snail Mail</x-components::heading>
					<p class="text-center">You are more than welcome to mail a check, <strong>payable to 12Two Missions</strong>, to the following address.</p>
					<p class="text-center text-xl font-semibold">PO BOX 996<br>Cypress, TX 77410</p>
				</div>
			</row>
		</x-sections::section>

		{{-- DONATE/SIGNUP --}}
		<x-sections::section>
			<row>

			</row>
		</x-sections::section>
	</x-slot:main>

</x-layouts::default>