<aside class="sticky top-0 bg-surface-dark text-body-white w-[280px] min-w-[280px] max-w-[280px] h-screen min-h-screen max-h-screen z-999 overflow-auto overscroll-contain" role="navigation">
	<div class="flex gap-4 justify-between items-center p-3">
		{{-- LOGO --}}
		<a href="{{ route('admin.dashboard') }}" class="px-4" aria-label="Return to homepage">
			<x-components::image id="header-logo" image="logo_admin_nav.png" alt="??? CMS" class="max-w-[40px]" loading="" />
		</a>

		<div class="flex items-center justify-end w-fit">
			<a href="{{ route('admin.dashboard') }}" class="text-3xl text-white bg-transparent rounded-full hover:bg-surface-dark-400 active:text-body-dark-50 active:bg-surface-dark-600 flex items-center justify-center w-11 h-11 transition-all ease-in-out" aria-label="My Profile">
				<i class="fa-duotone fa-gauge-high"></i>
			</a>

			<a href="#" class="text-3xl text-white bg-transparent rounded-full hover:bg-surface-dark-400 active:text-body-dark-50 active:bg-surface-dark-600 flex items-center justify-center w-11 h-11 transition-all ease-in-out" aria-label="My Profile">
				<i class="fa-duotone fa-circle-user"></i>
			</a>
		</div>
	</div>

	<div class="flex flex-col gap-8 pt-4 pb-8 px-3">
		<div class="flex flex-col items-center justify-center gap-1">
			<i class="fa-duotone fa-circle-user w-[85px] h-auto mb-3"></i>
			<span class="text-md font-bold text-white">{{ Auth::user()->name }}</span>
			<span class="text-sm">{{ Auth::user()->email }}</span>
		</div>

		@foreach ($navigation as $category)
			@can($category->permission)
				<x-acomponents::nav :category="[
					'heading' => [
						'title' => ($category->force_single) ? $category->label : Str::plural($category->label),
						'subtext' => '',
					],
					'items' => $category->collectionTypes
				]" />
			@endcan
		@endforeach

	</div>

</aside>