@props([
	'id' => '',
	'class' => '',
])

<section id="{{ $id }}" class="relative mobile:flex mobile:flex-col mobile:items-center mobile:justify-center py-6 even:bg-surface-50 even:text-body-800 even:shadow-float even:z-20 odd:z-10 odd:bg-surface-700 odd:text-body-50 group/section {{ $class }}">
	{{ $slot }}
</section>