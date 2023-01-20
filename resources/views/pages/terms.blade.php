<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Terms & Conditions',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
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
	</x-slot:main>

</x-layouts::default>