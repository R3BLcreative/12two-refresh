@props(['errors','bag'])

@if ($errors->$bag->any())
<div class="w-full rounded-lg mb-6 bg-surface-50 text-red-700 border-2 border-red-400 p-3 leading-normal">
	<p class="font-semibold mb-12px text-sm">There are errors with your submission. Please check the highlighted fields below.</p>
</div>
@endif

@if (session()->has('message'))
<div
	class="w-full rounded-lg bg-surface-50 text-green-700 border-2 border-green-400 p-3 leading-normal font-semibold text-sm mb-6">
	<p class="">
		{{ session()->get('message') }}
	</p>
</div>
@endif