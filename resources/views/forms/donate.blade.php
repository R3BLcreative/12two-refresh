@props([
	'class' => '',
	'btnStyle' => 'secondary',
	'bag' => 'donate', // Error bag name
])

<x-forms::notifications :errors="$errors" bag="{{ $bag }}" />

<form id="donation-form" action="{{ route('donate.store') }}#donate" class="grid grid-cols-2 gap-4 rounded-xl bg-body-50 p-6 text-body-800 shadow-lg border-2 border-surface-800 {{ $class }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::hidden id="route" value="{{ Route::current()->getName() }}" />

	<x-fields::input class="mobile:col-span-full laptop:col-span-1" id="fname" type="text" placeholder="John" label="First Name" value="{{ old('fname') }}" required="1" bag="{{ $bag }}" />
	<x-fields::input class="mobile:col-span-full laptop:col-span-1" id="lname" type="text" placeholder="Doe" label="Last Name" value="{{ old('lname') }}" required="1" bag="{{ $bag }}" />
	<x-fields::input class="mobile:col-span-full laptop:col-span-1" id="email" type="email" placeholder="john@email.com" label="Email" value="{{ old('email') }}" required="1" bag="{{ $bag }}" />
	<x-fields::input class="mobile:col-span-full laptop:col-span-1" id="cemail" type="email" placeholder="john@email.com" label="Confirm Email" value="{{ old('cemail') }}" required="1" bag="{{ $bag }}" />

	<x-fields::input class="mobile:col-span-full laptop:col-span-1" id="amount" type="text" placeholder="$20.00" label="Donation Amount" value="{{ old('amount') }}" required="1" currency="1" bag="{{ $bag }}" />
	<x-fields::input class="mobile:col-span-full laptop:col-span-1" id="ccFeeDisplay" type="text" placeholder="$0.00" label="Processing Fee" value="{{ old('ccFeeDisplay') }}" disabled="1" bag="{{ $bag }}" />
	<x-fields::hidden id="ccfee" value="{{ old('ccfee') }}" bag="{{ $bag }}" />

	<x-fields::select class="col-span-full" id="addFee" label="Want to cover the processing fee?" :options="[
		'yes' => 'Yes, I want to cover the fee.',
		'no' => 'No, I do not want to cover the fee.'
		]" value="{{ old('addFee') ?? 'yes' }}" placeholder="Select one" bag="{{ $bag }}" desc="Processing credit/debit cards online comes with a fee that is deducted from your donation. Including the fee will allow your full donation to be utilized by the ministry." />

	<span class="">&nbsp;</span>

	<x-components::button id="" tag="submit" style="{{ $btnStyle }}" class="!w-full col-span-full" icon="fa-brands fa-cc-stripe">Enter Payment Info</x-components::button>

	<p class="text-sm col-span-full text-center">Check out our <x-components::link href="{{ route('faqs.category', ['cat' => 'donations']) }}">FAQS page</x-components::link> for answers to common questions regarding donations to 12Two Missions.</p>

</form>