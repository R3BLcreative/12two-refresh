@props([
'id' => '',// The id attribute of the element
'itemID' => '',// The id attribute of the element toggle controls
'type' => '',// nav or dropdown
'label' => '',// aria-label attribute
'controls' => '',// aria-controls attribute
'expanded' => '',// Default aria-expanded state
'class' => '',// Class definitions
'text' => '',// Display text for button
'icon' => '',// Priority if present defaults to text
])

<button
	id="{{ $id }}"
	class="toggle {{ $class }}"
	data-controls="{{ $itemID }}"
	data-type="{{ $type }}"
	aria-label="{{ $label }}"
	aria-controls="{{ $controls }}"
	aria-expanded="{{ $expanded }}">

	@if($icon)
	{!! setting($icon) !!}
	@else
	{{ $text }}
	@endif

</button>