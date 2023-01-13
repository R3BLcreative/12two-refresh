@props([
	'class' => '',
	'btnStyle' => 'secondary',
])

<x-forms::notifications :errors="$errors" />

<form id="donation-form" action="{{ route('donate.store') }}" class="{{ $class }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::hidden id="route" value="{{ Route::current()->getName() }}" />

	<x-fields::input class="laptop:col-span-full" id="fname" type="text" placeholder="John" label="First Name" value="{{ old('fname') }}" required="1" />
	<x-fields::input class="laptop:col-span-full" id="lname" type="text" placeholder="Doe" label="Last Name" value="{{ old('lname') }}" required="1" />
	<x-fields::input class="laptop:col-span-full" id="email" type="email" placeholder="john@email.com" label="Email" value="{{ old('email') }}" required="1" />
	<x-fields::input class="laptop:col-span-full" id="cemail" type="email" placeholder="john@email.com" label="Confirm Email" value="{{ old('cemail') }}" required="1" />

	<span class="">&nbsp;</span>

	<x-components::button id="" tag="submit" style="{{ $btnStyle }}" class="!w-full col-span-full" icon="fa-brands fa-cc-stripe">Finalize Donation</x-components::button>

	<p class="text-sm col-span-full text-center">Check out our <x-components::link href="{{ route('faq.category', ['cat' => 'donations']) }}">FAQ page</x-components::link> for answers to common questions regarding donations to 12Two Missions.</p>

</form>