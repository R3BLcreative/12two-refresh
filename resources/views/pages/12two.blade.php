<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | About Us',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::hero preheader="Who we are" title="A Revolution of Revelation" image="" alt="">
			<x-slot:body>
				<p>At 12Two, we are driven to incite a <em>"Revolution of Revelation"</em> in the American church with missions as our tool for change. What do we mean by a <em>"Revolution of Revelation"</em>? We're glad you asked!</p>
			</x-slot:body>

			{{-- <x-slot:ctas class="flex flex-row gap-6">
				<x-components::button tag="a" style="secondary" href="#donate">Donate Today</x-components::button>
				<x-components::button tag="a" style="accent" href="{{ route('faq.category', ['cat' => 'donations']) }}">
					Donation FAQS
				</x-components::button>
			</x-slot:ctas> --}}
		</x-sections::hero>

		{{-- QUOTE --}}
		<x-sections::quote author="Alan Cohen">
			Everything will line up perfectly when knowing and living the truth becomes more important than looking good.
		</x-sections::quote>

		<x-sections::section class="!bg-horizon-dark bg-center bg-cover bg-no-repeat">
			<row>
				<div class="col-span-full text-center">
					<x-components::heading tag="span" style="preheader">
						Revival is our goal
					</x-components::heading>
					<x-components::heading tag="h2" style="h2">
						Transformation is our mission
					</x-components::heading>
				</div>
			</row>
			<row>
				<div class="col-span-full border-b border-b-surface-500 border-dotted"></div>
			</row>
			<row class="!py-6">
				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-3">
					<x-components::image image="img_revolution.jpg" alt="An image with the word REVOLUTION on top of several illustrated fists" class="shadow-md rounded-md" />
				</div>

				<div class="mobile:col-span-full tablet:col-span-4 laptop:col-span-3 italic font-semibold">
					<p class="text-secondary-accent-400 font-black tracking-widest">/revə'lo͞oSH(ə)n/ - noun</p>
					<p>A dramatic and wide-reaching change in the way something works or is organized or in people's ideas about it.</p>
				</div>

				<div class="mobile:col-span-full laptop:col-span-6 bg-surface-50 text-body-700 p-4 rounded-tr-lg rounded-bl-lg">
					<p>We want to incite a <strong>revolution</strong> of love that prompts change in the way we live out our faith. The current model for doing church and living out our faith seems to be broken. With a church on almost every street corner, the culture of our country should look different. This country is desperate for revival.</p>
				</div>
			</row>
			<row>
				<div class="col-span-full border-b border-b-surface-500 border-dotted"></div>
			</row>
			<row class="!py-6">
				<div class="mobile:col-span-full mobile:order-3 laptop:order-1 laptop:col-span-6 bg-surface-50 text-body-700 p-4 rounded-tr-lg rounded-bl-lg">
					<p>Something needs to change. We don't want to just create change for the sake of change. This change should be rooted and built upon the foundations of divine <strong>revelation</strong>. Luckily, we have the Bible and the Holy Spirit to look too for this. God has given us the blueprint, we just need to follow it. Transformation begins here.</p>
				</div>

				<div class="mobile:col-span-full mobile:order-2 tablet:order-1 tablet:col-span-4 laptop:order-2 laptop:col-span-3 italic font-semibold">
					<p class="text-secondary-accent-400 font-black tracking-widest">/revə'lāSH(ə)n/ - noun</p>
					<p>A surprising and previously unknown fact, especially one that is made known in a dramatic way.</p>
				</div>

				<div class="mobile:col-span-full mobile:order-1 tablet:order-2 tablet:col-span-4 laptop:order-3 laptop:col-span-3">
					<x-components::image image="img_revelation.jpg" alt="An image with the word REVELATION on top of clouds with sun rays shinning through" class="shadow-md rounded-md" />
				</div>
			</row>
			<row>
				<div class="col-span-full border-b border-b-surface-500 border-dotted"></div>
			</row>
			<row>
				<div class="col-span-full text-xl text-center leading-loose">
					<p>It's time that the American church be more than a place we go to. It's time for His people to stop attending and start going. Let the broken find healing, the proud find humility, and the lost find grace. It's time for a <em>"Revolution of Revelation"</em>!</p>
				</div>
			</row>
		</x-sections::section>

		{{-- WHAT WE DO --}}
		<x-sections::what-we-do />
	</x-slot:main>

</x-layouts::default>