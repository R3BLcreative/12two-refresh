@props([
	'bag' => 'default', // Error bag name
])

<x-forms::notifications :errors="$errors" bag="{{ $bag }}" />

<form id="forgot-password-form" action="{{ route('password.email') }}" class="flex flex-col gap-6 bg-surface-50 border border-surface-400 shadow-lg rounded-lg py-6 px-8" method="post" enctype="multipart/form-data" novalidate>
	@csrf
	@method('post')

	<x-fields::input class="" id="email" type="email" placeholder="john@email.com" label="Email" value="{{ old('email') }}" required="1" bag="{{ $bag }}" />

	<x-components::button id="" tag="submit" style="primary" class="!w-full" icon="fa-duotone fa-paper-plane">
		Send Reset Email
	</x-components::button>

	<div class="flex flex-col items-center justify-center gap-4 mt-6">
		<p class="text-body-700 font-semibold text-lg text-center !mb-0">Did you remember?</p>

		<x-components::button id="" href="{{ route('login') }}" tag="a" style="accent" size="small" icon="fa-duotone fa-right-to-bracket">
			Login
		</x-components::button>
	</div>

</form>