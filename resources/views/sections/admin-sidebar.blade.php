@aware(['contentTypes'])

<aside class="flex flex-col gap-8 bg-surface-dark text-body-white w-[280px] max-w-[280px] h-screen py-10 px-3" role="navigation">

	{{-- LOGO --}}
	<a href="{{ route('admin.dashboard') }}" class="px-4" aria-label="Return to homepage">
		<x-components::image id="header-logo" image="logo_admin_nav.png" alt="12Two Missions" class="max-w-[100px]" loading="" />
	</a>

	<x-components::admin-nav :atts="[
		'heading' => [
			'title' => 'Content Types',
			'subtext' => 'The meat of the site',
		],
		'items' => $contentTypes
	]" />

	<x-components::admin-nav :atts="[
		'heading' => [
			'title' => 'eCommerce',
			'subtext' => 'Payments, donations, etc.',
		],
		'items' => [
			[
				'icon' => 'fa-credit-card',
				'plural' => 'Payments',
				'slug' => 'dashboard',
			],
			[
				'icon' => 'fa-gift',
				'plural' => 'Donations',
				'slug' => 'dashboard',
			],
			[
				'icon' => 'fa-envelopes-bulk',
				'plural' => 'Subscribers',
				'slug' => 'dashboard',
			],
		]
	]" />

	<x-components::admin-nav :atts="[
		'heading' => [
			'title' => 'Trips',
			'subtext' => 'Creation & Management',
		],
		'items' => [
			[
				'icon' => 'fa-earth-americas',
				'plural' => 'Trips',
				'slug' => 'dashboard',
			],
			[
				'icon' => 'fa-users-viewfinder',
				'plural' => 'Groups',
				'slug' => 'dashboard',
			],
			[
				'icon' => 'fa-id-badge',
				'plural' => 'Participants',
				'slug' => 'dashboard',
			],
		]
	]" />

	<x-components::admin-nav :atts="[
		'heading' => [
			'title' => 'Settings',
			'subtext' => 'Controls, options, etc.',
		],
		'items' => [
			[
				'icon' => 'fa-users',
				'plural' => 'Users',
				'slug' => 'dashboard',
			],
			[
				'icon' => 'fa-chart-tree-map',
				'plural' => 'Content Types',
				'slug' => 'dashboard',
			],
			[
				'icon' => 'fa-gears',
				'plural' => 'Options',
				'slug' => 'dashboard',
			],
		]
	]" />

</aside>