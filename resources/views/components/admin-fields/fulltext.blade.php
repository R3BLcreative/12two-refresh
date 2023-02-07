@props([
	'class',
	'id',
	'label',
	'value' => '',
	'placeholder',
	'desc',
	'required',
	])

<div class="col-span-full flex flex-col gap-2">
	@isset($label)
		<x-admin-fields::label :id="$id" :required="$required">{!! $label !!}</x-admin-fields::label>
	@endisset

	<script src="https://cdn.tiny.cloud/1/x294jyglq9n4op2ksaz5iuhvm8mdw9y8nu32uq3z3gwcmylz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: 'textarea.tinyMCE',
			menubar: false,
			plugins: 'quickbars image link lists code emoticons',
			toolbar: 'undo redo | blocks | bold italic | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist | link | code',
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
		name="{{ $id }}"
		placeholder="{{ $placeholder ?? '' }}"
		class="text-base w-full tinyMCE @error($id) border-error @enderror">{{ $value ?? '' }}</textarea>

	@isset($desc)
		<x-admin-fields::description>{{ $desc }}</x-admin-fields::description>
	@endisset

	@error($id)
		<x-admin-fields::error>{{ $message }}</x-admin-fields::error>
	@enderror
</div>