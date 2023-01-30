@props([
'id' => '',// Element ID attribute
'tag' => 'h1',// h1, h2, h3, h4, h5, h6, span
'style' => 'h1',// h1, h2, h3, h4, h5, h6, nav, badges, tableheader
'subtext' => '',// The subtext
'class' => '',// Additional class atts/overrides
])

@php
$classes = [
	'none' => '',
	'h1' => [
		'heading' => 'text-6xl font-bold',
		'subtext' => 'text-lg font-normal text-body-light-600',
	],
	'h2' => [
		'heading' => 'text-4xl font-black',
		'subtext' => 'text-base font-normal',
	],
	'h3' => [
		'heading' => '',
		'subtext' => 'text-base font-normal',
	],
	'h4' => [
		'heading' => '',
		'subtext' => 'text-base font-normal',
	],
	'h5' => [
		'heading' => '',
		'subtext' => 'text-base font-normal',
	],
	'h6' => [
		'heading' => '',
		'subtext' => 'text-base font-normal',
	],
	'nav' => [
		'heading' => 'uppercase text-primary-300 font-black text-base tracking-wider',
		'subtext' => 'text-sm font-semibold tracking-wide text-body-white-500',
	],
];

$styles = $classes[$style]['heading'];
@endphp

<div class="{{ $class }}">
	@switch($tag)
	@case('h1')
		<h1 id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</h1>
	@break

	@case('h2')
		<h2 id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</h2>
	@break

	@case('h3')
		<h3 id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</h3>
	@break

	@case('h4')
		<h4 id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</h4>
	@break

	@case('h5')
		<h5 id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</h5>
	@break

	@case('h6')
		<h6 id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</h6>
	@break

	@case('span')
		<span id="{{ $id }}" class="{{ $styles }}">{!! $slot !!}</span>
	@break

	@endswitch

	@if($subtext)
		<span class="{{ $classes[$style]['subtext'] }}">{!! $subtext !!}</span>
	@endif
</div>