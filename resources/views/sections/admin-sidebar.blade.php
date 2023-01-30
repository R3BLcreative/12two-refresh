@aware(['contentTypes'])

<aside class="sticky top-0 bg-surface-dark text-body-white w-[280px] min-w-[280px] max-w-[280px] h-screen min-h-screen max-h-screen z-999 overflow-auto overscroll-contain" role="navigation">

	<div class="flex flex-col gap-8 py-10 px-3">
		{{-- LOGO --}}
		<a href="{{ route('admin.dashboard') }}" class="px-4" aria-label="Return to homepage">
			<x-components::image id="header-logo" image="logo_admin_nav.png" alt="12Two Missions" class="max-w-[100px]" loading="" />
		</a>

		<x-components::admin-nav :atts="[
			'heading' => [
				'title' => 'Content',
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
					'slug' => 'payments',
				],
				[
					'icon' => 'fa-gift',
					'plural' => 'Donations',
					'slug' => 'donations',
				],
				[
					'icon' => 'fa-envelopes-bulk',
					'plural' => 'Subscribers',
					'slug' => 'subscribers',
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
					'slug' => 'trips',
				],
				[
					'icon' => 'fa-users-viewfinder',
					'plural' => 'Groups',
					'slug' => 'groups',
				],
				[
					'icon' => 'fa-id-badge',
					'plural' => 'Participants',
					'slug' => 'participants',
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
					'slug' => 'users',
				],
				[
					'icon' => 'fa-chart-tree-map',
					'plural' => 'Content Types',
					'slug' => 'contentTypes',
				],
				[
					'icon' => 'fa-gears',
					'plural' => 'Options',
					'slug' => 'options',
				],
			]
		]" />
	</div>

</aside>