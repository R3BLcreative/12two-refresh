@props([
'id',
'image',
'alt',
'class' => 'w-full h-auto',
'width',
'height',
])

<svg id="{{ $id ?? '' }}" alt="{{ $alt ?? '' }}" class="{{ $class }}" width="{{ $width }}" height="{{ $height }}">
	<use href="{{ asset('images/'.$image) }}"></use>
</svg>