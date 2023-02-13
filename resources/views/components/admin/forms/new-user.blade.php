<form
	action="{{ route('admin.users.store') }}"
	method="post"
	class="grid grid-cols-8 gap-7 overflow-auto overscroll-contain p-8 border-t border-gray-300"
	enctype="multipart/form-data"
	novalidate
	>
	@csrf
	@method('post')

	<x-afields::string
		id="name"
		label="Name"
		placeholder="John Doe"
		value="{{ old('name') ?? '' }}"
		required="1" />

	<x-afields::string
		id="email"
		label="Email/Username"
		placeholder="john@example.com"
		value="{{ old('email') ?? '' }}"
		required="1" />

	<x-afields::password
		id="password"
		label="Password"
		placeholder="•••••••••••••••"
		value=""
		required="1" />

	<x-afields::password
		id="password_confirmation"
		label="Confirm Password"
		placeholder="•••••••••••••••"
		value=""
		required="1" />

	<x-afields::select
		id="role"
		label="Role"
		placeholder="Select One"
		value="{{ old('role') ?? '' }}"
		required="1"
		:options="$roles" />

	<x-acomponents::button tag="submit" style="primary" icon="fa-user-plus">
		Create
	</x-acomponents::button>
</form>