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
		<x-sections::hero title="Values & Beliefs" image="" alt="">
			<x-slot:body>
				<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Phasellus laoreet lorem vel dolor tempus vehicula. Quisque ut dolor gravida, placerat libero vel, euismod. Morbi fringilla convallis sapien, id pulvinar odio volutpat. Me non paenitet nullum festiviorem excogitasse ad hoc. Hi omnes lingua, institutis, legibus inter se differunt.</p>
			</x-slot:body>
		</x-sections::hero>

		<x-sections::quote author="Roy E. Disney">
			When your values are clear to you, making decisions becomes easier.
		</x-sections::quote>

		{{-- CORE VALUES --}}
		<x-sections::values />

		{{-- BELIEFS --}}
		<x-sections::beliefs />
@endsection
