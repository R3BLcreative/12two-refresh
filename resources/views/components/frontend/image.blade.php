@props([
'id' => '',
'image' => '',
'alt' => '',
'class' => 'w-full h-auto',
'loading' => 'lazy',
])

<img id="{{ $id }}-image" src="{{ asset('images/'.$image) }}" alt="{{ $alt }}" class="{{ $class }}" width="{{ getimagesize(asset('images/'.$image))[0] }}" height="{{ getimagesize(asset('images/'.$image))[1] }}" loading="{{ $loading }}">