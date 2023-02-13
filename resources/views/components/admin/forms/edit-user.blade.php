@props(['user'])

<form
	action="{{ route('admin.users.update', [$user]) }}"
	method="post"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8 border-t border-gray-300"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method('patch')

	<x-afields::section label="Profile Details" desc="" class="" />

	<x-afields::string
		id="name"
		label="Name"
		placeholder="John Doe"
		value="{{ $user->name }}"
		required="1" />

	<x-afields::string
		id="email"
		label="Email/Username"
		placeholder="john@example.com"
		value="{{ $user->email }}"
		required="1" />

	<x-afields::select
		id="role"
		label="Role"
		placeholder="Select One"
		value="{{ $user->getRoleNames()[0] }}"
		required="1"
		:options="$roles" />

	<x-acomponents::button tag="submit" style="primary" icon="fa-up-from-bracket">
		Update
	</x-acomponents::button>
</form>