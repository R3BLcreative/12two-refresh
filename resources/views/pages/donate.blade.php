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
				<x-components::button tag="a" style="secondary" href="#donate">Donate Today</x-components::button>
				<x-components::button tag="a" style="accent" href="{{ route('faq.category', ['cat' => 'donations']) }}">
					Donation FAQS
				</x-components::button>
			</x-slot:ctas>
		</x-sections::hero>

		{{-- QUOTE --}}
		<x-sections::quote author="Anne Frank">
			No one has ever become poor by giving.
		</x-sections::quote>

		{{-- BY THE NUMBERS --}}
		<x-sections::numbers />

		{{-- DONATE/SIGNUP --}}
		<x-sections::section>
			<x-components::anchor id="donate" />

			<row class="!items-start">
				<div class="mobile:col-span-full tablet:col-span-3 laptop:col-span-5">
					<x-components::heading tag="span" style="preheader">Become a</x-components::heading>
					<x-components::heading tag="h2" style="h2">Financial Partner</x-components::heading>

					<p>No matter the amount <em>(substanial, with-in the budget, monthly, or one-time)</em>, we are grateful for your support and pray that God's abundant favor and blessings are poured out on you and your loved ones in response to your gift today.</p>

					<p>Complete the form to make a donation. Your payment info will be entered and processed securely via <x-components::link href="https://stripe.com" target="_blank" rel="nofollow noopener external">Stripe.com</x-components::link> in the next step.</p>

					<x-components::heading tag="h3" style="h3">Snail Mail</x-components::heading>
					<p class="">You are more than welcome to mail a check, <strong>payable to 12Two Missions</strong>, to the following address.</p>
					<p class="text-xl font-semibold">12Two Missions<br>PO BOX 996<br>Cypress, TX 77410</p>
				</div>

				{{-- ONE TIME --}}
				<div class="mobile:col-span-full tablet:col-span-5 laptop:col-span-7">
					<x-forms::donate btnStyle="accent" />
				</div>
			</row>
		</x-sections::section>
	</x-slot:main>

</x-layouts::default>