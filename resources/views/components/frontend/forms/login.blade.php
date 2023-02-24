@props([
	'bag' => 'default', // Error bag name
])

<x-forms::notifications :errors="$errors" bag="{{ $bag }}" />

<form id="login-form" action="{{ route('login') }}" class="flex flex-col gap-6 bg-surface-50 border border-surface-400 shadow-lg rounded-lg py-6 px-8" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::input class="" id="email" type="email" placeholder="john@email.com" label="Email" value="{{ old('email') }}" required="1" bag="{{ $bag }}" />

	<x-fields::input class="" id="password" type="password" placeholder="********" label="Password" value="{{ old('password') }}" required="1" bag="{{ $bag }}" />

	<x-fields::check class="" id="remember" label="Remember me" value="1" bag="{{ $bag }}" />

	<div class="mt-6 flex flex-wrap items-center justify-between gap-6">
		<x-components::button id="" tag="submit" style="primary" class="grow" icon="fa-duotone fa-right-to-bracket">
			Login
		</x-components::button>

		<x-components::button id="" href="{{ route('password.request') }}" tag="a" style="secondary">
			I Forget...
		</x-components::button>
	</div>

	<div class="flex flex-col items-center justify-center gap-4 mt-6">
		<p class="text-body-700 font-semibold text-lg text-center !mb-0">Don't have an account yet?</p>

		<x-components::button id="" href="{{ route('register') }}" tag="a" style="accent" size="small" icon="fa-duotone fa-user-plus">
			Signup Here
		</x-components::button>
	</div>

</form>