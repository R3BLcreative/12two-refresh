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
			<div class="w-full mobile:col-span-full tablet:col-span-6 tablet:col-start-2 laptop:col-span-6 laptop:col-start-4 flex flex-col gap-6">
				<x-components::heading tag="h1" style="h4" class="text-center">
					Request Password Reset
				</x-components::heading>

				<x-forms::forgot-password />
			</div>
		</row>
	</x-sections::section>
@endsection