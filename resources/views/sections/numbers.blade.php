@php
	$wrapper = 'flex flex-col gap-3 items-center justify-stretch';
	$iconc = 'mobile:text-7xl tablet:text-8xl mb-4 drop-shadow-sm';
	$icons ='--fa-primary-color: #58AB27; --fa-secondary-color: #58AB27;';
	$counter = 'mobile:text-5xl tablet:text-7xl font-black text-secondary-200 drop-shadow-sm';
	$textc = 'uppercase mobile:text-base tablet:text-xl font-bold text-center';
@endphp

<x-sections::section>
	<row>
		<div class="col-span-full flex mobile:flex-col tablet:flex-row justify-start items-start gap-6">
			<x-components::heading tag="h2" style="h2">By The Numbers</x-components::heading>
			<p>Since 2015, the generosity of our financial partners and trip participants has made waves throughout His Kingdom in ways that can not be measured. We never want this ministry to be driven by <em>"numbers"</em> or <em>"statistics"</em> because these tertiary things can not reflect the impact of a single life transformed. However, the implication of that impact can be presumed in the light of His faithfulness to take our offerings and multiply them for His great purposes. <strong>Jesus transformed thousands of lives with 2 fish and 5 loaves.</strong> Just imagine what He has done with the following since 12Two started.</p>
		</div>

		{{-- TRIPS LEAD --}}
		<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
			<x-components::counter speed="600" value="140" wrapper="{{  $wrapper }}" text="Trips" icon="fa-duotone fa-route" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" icons="{{ $icons }}" after="+" afterc="{{ $counter }}" />
		</div>

		{{-- COMMUNITIES --}}
		<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
			<x-components::counter speed="10000" value="15" wrapper="{{ $wrapper }}" text="Communities" icon="fa-duotone fa-earth-americas" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" icons="{{ $icons }}" />
		</div>

		{{-- DONATIONS --}}
		<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
			<x-components::counter speed="600" value="290" wrapper="{{ $wrapper }}" text="Raised" icon="fa-duotone fa-hands-holding-dollar" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" after="K" afterc="{{ $counter }}" before="$" beforec="{{ $counter }}" icons="{{ $icons }}" />
		</div>

		{{-- PARTICIPANTS --}}
		<div class="mobile:col-span-2 tablet:col-span-4 laptop:col-span-3">
			<x-components::counter speed="400" value="2160" wrapper="{{ $wrapper }}" text="Participants" icon="fa-duotone fa-users-viewfinder" iconc="{{ $iconc }}" counter="{{ $counter }}" textc="{{ $textc }}" after="+" afterc="{{ $counter }}" icons="{{ $icons }}" />
		</div>
	</row>
</x-sections::section>