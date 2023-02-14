<div class="mobile:hidden tablet:flex tablet:col-span-3 flex-col gap-4">
	<x-components::heading tag="h3" style="h5" class="!mb-0">
		My Account
	</x-components::heading>
	<ul class="w-full">
		<x-components::dashboard-nav-item route="dashboard.profile">
			Profile
		</x-components::dashboard-nav-item>
		<x-components::dashboard-nav-item route="dashboard.security">
			Security
		</x-components::dashboard-nav-item>
		<x-components::dashboard-nav-item route="dashboard.trips">
			Trips
		</x-components::dashboard-nav-item>
		<x-components::dashboard-nav-item route="dashboard.donations">
			Donations
		</x-components::dashboard-nav-item>
	</ul>

	@can('manage-groups')
		<hr />

		<x-components::heading tag="h3" style="h5" class="!mb-0">
			Groups
		</x-components::heading>
		<ul class="w-full">
			<x-components::dashboard-nav-item route="dashboard.groups.trips">
				Trips
			</x-components::dashboard-nav-item>
			<x-components::dashboard-nav-item route="dashboard.groups.participants">
				Participants
			</x-components::dashboard-nav-item>
			<x-components::dashboard-nav-item route="dashboard.groups.resources">
				Resources
			</x-components::dashboard-nav-item>
		</ul>
	@endcan

	@can('manage-backend')
		<hr />

		<ul class="w-full">
			<x-components::dashboard-nav-item route="admin.dashboard">
				Admin Dashboard
			</x-components::dashboard-nav-item>
		</ul>
	@endcan
</div>