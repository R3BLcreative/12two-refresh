<x-layouts::default
	:seo="[
	'name' => '12Two Missions',
	'title' => '12Two Missions | Cookie Policy',
	'desc' => '',
	'indexing' => false
	]">

	<x-slot:main>
		<x-sections::section class="!bg-white">
			<row>
				<div name="termly-embed" data-id="e03d2786-ec00-491e-99dd-a9eee5be05fb" data-type="iframe" class="col-span-full"></div>
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