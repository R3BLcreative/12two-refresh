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
	<x-sections::hero title="Terms & Conditions" image="" alt="">
		<x-slot:body></x-slot:body>
	</x-sections::hero>

	<x-sections::section>
		<row>
			<div name="termly-embed" data-id="8c133d36-d975-41c8-9fcb-e27e740ad7e5" data-type="iframe" class="col-span-full"></div>
			<script type="text/javascript">
				(function(d, s, id) {
					var js, tjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "https://app.termly.io/embed-policy.min.js";
					tjs.parentNode.insertBefore(js, tjs);
				}(document, 'script', 'termly-jssdk'));
			</script>
		</row>
	</x-sections::section>
@endsection

@section('foot')
	<script type="text/javascript" src="https://app.termly.io/embed.min.js" data-auto-block="on" data-website-uuid="0537e4ad-c9bb-4819-8a63-aabde5a63ab0"></script>
@endsection