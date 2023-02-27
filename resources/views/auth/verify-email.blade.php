@php
	$seo = [
		'indexing' => false,
		'title' => '',
		'desc' => "",
		'name' => '',
	];
@endphp

@extends('layouts.frontend')

@section('main')
	<x-sections::hero preheader="We sent you a link" title="Email Verification" image="" alt="">
		<x-slot:body>
			<p><strong>We sent you an email with a verification link in it to ensure that your email address is a real one.</strong> We know... We know... You like your privacy, and you don't want a bunch of junk mail from us. We get it!!! However, we need a real email address for your account to ensure that you always have access to it. <strong>If you didn't subscribe to our mailing list during registration, then you won't recieve any emails that are not related to your account with us.</strong></p>
		</x-slot:body>
	</x-sections::hero>
	<x-sections::section>
		<row>
			<div class="w-full mobile:col-span-full flex flex-col gap-6">
				<x-components::heading tag="h1" style="h2" class="text-center">
					Didn't Get The Email?
				</x-components::heading>

				<p class="text-center text-lg">Check your JUNK and SPAM folders just in case it is getting delivered there. If you need a new link, simply click the button below.</p>

				<form id="connect-form" action="{{ route('verification.send') }}" class="flex flex-col gap-6 items-center" method="post" enctype="multipart/form-data" novalidate>
					@csrf
					@method('post')

					<x-components::button tag="submit" style="secondary">
						Resend Link
					</x-components::button>

					@if (session('status') == 'verification-link-sent')
						<x-forms::messages message="A new email verification link has been emailed to you!" />
					@endif
				</form>
			</div>
		</row>
	</x-sections::section>
@endsection