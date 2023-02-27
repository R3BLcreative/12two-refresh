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
	<x-sections::section>
		<row>
			<div class="col-span-full">
				<x-components::heading tag="h1" style="h3" class="whitespace-pre">
					Account - Security
				</x-components::heading>
			</div>
		</row>

		<row class="!items-start">
			{{-- DASHBOARD NAV --}}
			<x-components::dashboard-nav />

			{{-- CONTENT --}}
			<div class="mobile:col-span-full tablet:col-span-5 laptop:col-span-9">
				<div class="w-full border border-surface-300 rounded-lg shadow-md bg-surface-50 p-8 text-body-700">
					Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod. Morbi fringilla convallis sapien, id pulvinar odio volutpat. Me non paenitet nullum festiviorem excogitasse ad hoc. Hi omnes lingua, institutis, legibus inter se differunt.s 
				</div>
			</div>
		</row>
	</x-sections::section>
@endsection

