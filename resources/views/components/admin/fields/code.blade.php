@props([
	'class' => 'col-span-full',
	'id',
	'name',
	'label',
	'value' => '',
	'placeholder' => '',
	'desc',
	'required' => '',
	'disabled',
	'tabindex' => '0',
	])

<div class="flex flex-col gap-2 {{ $class }}">
	@isset($label)
		<x-afields::label :id="$id" :required="$required">{!! $label !!}</x-afields::label>
	@endisset

	<script src="https://cdn.tiny.cloud/1/x294jyglq9n4op2ksaz5iuhvm8mdw9y8nu32uq3z3gwcmylz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: 'textarea.tinyMCE',
			menubar: false,
			plugins: 'code',
			toolbar: false,
			statusbar: false,
		});
	</script>

	<textarea
		id="{{ $id }}"
		name="{{ $name ?? $id }}"
		tabindex="{{ $tabindex }}"
		placeholder="{{ $placeholder ?? '' }}"
		@isset($disabled) disabled @endisset
		class="text-base w-full tinyMCE disabled:opacity-50 @error($id) border-error @enderror"
	>{{ $value ?? '' }}</textarea>

	@isset($desc)
		<x-afields::description>{!! $desc !!}</x-afields::description>
	@endisset

	@error($id)
		<x-afields::error>{!! $message !!}</x-afields::error>
	@enderror
</div>