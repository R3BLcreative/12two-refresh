@props([
	'class' => '',
	'btnStyle' => 'secondary',
	'bag' => 'subscribe', // Error bag name
])

<x-forms::notifications :errors="$errors" bag="{{ $bag }}" />

<form id="subscribe-form" action="{{ route('subscribe.store') }}#subscribe" class="{{ $class }}" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::hidden id="route" value="{{ Route::current()->getName() }}" bag="{{ $bag }}" />

	<x-fields::input class="laptop:col-span-full" id="fname" type="text" placeholder="John" label="First Name" value="{{ old('fname') }}" required="1" bag="{{ $bag }}" />
	<x-fields::input class="laptop:col-span-full" id="lname" type="text" placeholder="Doe" label="Last Name" value="{{ old('lname') }}" required="1" bag="{{ $bag }}" />
	<x-fields::input class="laptop:col-span-full" id="email" type="email" placeholder="john@email.com" label="Email" value="{{ old('email') }}" required="1" bag="{{ $bag }}" />
	<x-fields::input class="laptop:col-span-full" id="cemail" type="email" placeholder="john@email.com" label="Confirm Email" value="{{ old('cemail') }}" required="1" bag="{{ $bag }}" />

	<span class="">&nbsp;</span>

	<x-components::button id="" tag="submit" style="{{ $btnStyle }}" size="default" class="!w-full col-span-full">Subscribe</x-components::button>

</form>