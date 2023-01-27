<header class="relative flex flex-0 items-center justify-between w-full h-16 px-6 z-49 shadow bg-white gap-6">
	<a href="#" class="text-3xl text-gray-400 bg-transparent rounded-full hover:bg-gray-200 active:text-body-dark active:bg-gray-300 flex items-center justify-center w-11 h-11 transition-all ease-in-out">
		<i class="fa-duotone fa-bars"></i>
	</a>

	<div class="flex items-center gap-1">
		<a href="#" class="text-3xl text-gray-400 bg-transparent rounded-full hover:bg-gray-200 active:text-body-dark active:bg-gray-300 flex items-center justify-center w-11 h-11 transition-all ease-in-out" aria-label="My Profile">
			<i class="fa-duotone fa-circle-user"></i>
		</a>

		<a href="{{ route('admin.dashboard') }}" class="text-3xl text-gray-400 bg-transparent rounded-full hover:bg-gray-200 active:text-body-dark active:bg-gray-300 flex items-center justify-center w-11 h-11 transition-all ease-in-out" aria-label="My Profile">
			<i class="fa-duotone fa-gauge-high"></i>
		</a>

		<a href="{{ route('dashboard') }}" class="text-3xl text-gray-400 bg-transparent rounded-full hover:bg-gray-200 active:text-body-dark active:bg-gray-300 flex items-center justify-center w-11 h-11 transition-all ease-in-out" aria-label="Back to Frontend Dashboard">
			<i class="fa-duotone fa-right-from-bracket"></i>
		</a>
	</div>
</header>