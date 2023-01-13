@props([
	'id' => '',
	'class' => '',
])

<section id="{{ $id }}" class="mobile:flex mobile:flex-col mobile:items-center mobile:justify-center py-20 even:bg-surface-50 even:text-body-800 odd:bg-surface-700 odd:text-body-50 shadow-inner group/section {{ $class }}">
	{{ $slot }}
</section>