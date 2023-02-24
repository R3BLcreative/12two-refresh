@props([
	'class' => '',
	'btnStyle' => 'secondary',
	'bag' => 'subscribe', // Error bag name
])

@if (session()->has('message'))
<div
	class="w-full rounded-lg bg-surface-50 text-green-700 border-2 border-green-400 p-3 leading-normal font-semibold text-sm mb-0">
	<p class="">
		{{ session()->get('message') }}
	</p>
</div>

@else

<form id="connect-form" action="{{ route('connect.store') }}#connect" class="{{ $class }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::hidden id="route" value="{{ Route::current()->getName() }}" bag="{{ $bag }}" />

	<x-fields::input id="name" type="text" placeholder="Your Name" value="{{ old('name') }}" required="1" bag="{{ $bag }}" class="mobile:w-full tablet:w-fit" />

	<x-fields::input id="email" type="email" placeholder="Your Email" value="{{ old('email') }}" required="1" bag="{{ $bag }}" class="mobile:w-full tablet:w-fit" />

	<x-fields::input id="email_confirmation" type="email" placeholder="Confirm Your Email" value="{{ old('email_confirmation') }}" required="1" bag="{{ $bag }}" class="mobile:w-full tablet:w-fit" />

	<x-fields::select id="topic" value="{{ old('topic') }}" placeholder="I am messaging about..." required="1" bag="{{ $bag }}" :options="[
		'Speaking at our event' => 'Speaking at our event',
		'Registering for a trip' => 'Registering for a trip',
		'Organizing a group trip' => 'Organizing a group trip',
		'Making a donation' => 'Making a donation',
		'Becoming an ambassador' => 'Becoming an ambassador',
		'Issues with my account' => 'Issues with my account',
		'Privacy, Cookies, Terms, & Data' => 'Privacy, Cookies, Terms, & Data',
		'A topic that is not listed here' => 'A topic that is not listed here',
	]" class="mobile:w-full tablet:w-fit" />

	<x-components::button id="" tag="submit" style="{{ $btnStyle }}" size="default" class="">
		Send
	</x-components::button>

</form>

@endif