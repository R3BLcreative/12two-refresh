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

<div id="{{ $id }}-wrapper" class="flex flex-col gap-2 {{ $class }}">
	@if(!empty($label))
		<x-afields::label :$id :$required>{!! $label !!}</x-afields::label>
	@endif

	<script src="https://cdn.tiny.cloud/1/x294jyglq9n4op2ksaz5iuhvm8mdw9y8nu32uq3z3gwcmylz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: 'textarea.tinyMCE',
			menubar: false,
			plugins: 'quickbars image link lists code emoticons',
			toolbar: 'undo redo | blocks | bold italic | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist | link | code',
			statusbar: false,
			link_default_target: '_blank',
			link_default_protocol: 'http',
			a11y_advanced_options: true,
			image_title: true,
			image_caption: true,
			automatic_uploads: true,
			file_picker_types: 'image',
		});
	</script>

	<textarea
		id="{{ $id }}"
		name="{{ $name ?? $id }}"
		tabindex="{{ $tabindex }}"
		placeholder="{{ $placeholder ?? '' }}"
		@if($disabled === true) disabled @endif
		class="text-base w-full tinyMCE disabled:opacity-50 @error($id) border-error @enderror"
	>{{ $value ?? '' }}</textarea>

	@if(!empty($desc))
		<x-afields::description>{!! $desc !!}</x-afields::description>
	@endif
</div>