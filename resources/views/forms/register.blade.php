@props([
	'bag' => 'default', // Error bag name
])

<x-forms::notifications :errors="$errors" bag="{{ $bag }}" />

<form id="register-form" action="{{ route('register') }}" class="flex flex-col gap-6 bg-surface-50 border border-surface-400 shadow-lg rounded-lg py-6 px-8" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::input class="" id="name" type="text" placeholder="John Doe" label="Name" value="{{ old('name') }}" required="1" bag="{{ $bag }}" />

	<x-fields::input class="" id="email" type="email" placeholder="john@email.com" label="Email" value="{{ old('email') }}" required="1" bag="{{ $bag }}" />

	<x-fields::input class="" id="password" type="password" placeholder="********" label="Password" value="{{ old('password') }}" required="1" bag="{{ $bag }}" />

	<x-fields::input class="" id="password_confirmation" type="password" placeholder="********" label="Confirm Password" value="{{ old('password_confirmation') }}" required="1" bag="{{ $bag }}" />

	<x-components::button id="" tag="submit" style="primary" class="!w-full" icon="fa-duotone fa-user-plus">
		Signup
	</x-components::button>

	<div class="flex flex-col items-center justify-center gap-4 mt-6">
		<p class="text-body-700 font-semibold text-lg text-center !mb-0">Already have an account?</p>

		<x-components::button id="" href="{{ route('login') }}" tag="a" style="accent" size="small" icon="fa-duotone fa-right-to-bracket">
			Login
		</x-components::button>
	</div>

</form>