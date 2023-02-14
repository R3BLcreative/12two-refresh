@props(['item'])

@php
	if(request()->segment(2) == $item->slug) {
		$active = true;
	}elseif($item->slug == 'users' && (request()->segment(2) == 'roles' || request()->segment(2) == 'permissions')) {
		$active = true;
	}else{
		$active = false;
	}

@endphp

<li class="group py-3 px-4 rounded-md transition-all ease-in-out @if($active) bg-surface-white-200 hover:bg-surface-white-300 @else hover:bg-surface-white-200 @endif">

	<a href="{{ $item->route ?? route('admin.collections.index', $item) }}" class="flex flex-auto items-center gap-4 font-semibold transition-all ease-in-out @if($active) text-white @else group-hover:text-white @endif">
		<i class="fa-duotone {{ $item->icon }} text-xl transition-all ease-in-out"></i>

		{{ ($item->force_single) ? $item->label : Str::plural($item->label) }}
	</a>

</li>