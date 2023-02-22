<x-layouts::admin :title="$title">

	<x-slot:main>
		<x-acomponents::titlebar
			icon="fa-clipboard-list"
			:title="$title"
			subtext="Use form builder below to create the form for managing collection records of this type.">

			{{-- <x-acomponents::create-button route="{{ route('admin.collections.create', $collectionType) }}" /> --}}
		</x-acomponents::titlebar>

		<div class="w-full relative flex flex-col flex-auto overflow-hidden">
			{{-- TABS --}}
			@if(isset($item->allow_form_builder) && $item->allow_form_builder === true)
				<x-acomponents::tabs :tabs="[
					[
						'expanded' => 'false',
						'href' => route('admin.collections.edit', [$collectionType, $item->id]),
						'label' => 'General',
					],
					[
						'expanded' => 'true',
						'href' => route('admin.collections.form', [$collectionType, $item->id]),
						'label' => 'Form Builder',
					],
				]" />
			@endif


			{{-- EDIT FORM --}}
			<x-aforms::form-builder
				id="admin-form-builder"
				action="{{ route('admin.collections.form.update', [$collectionType, $item->id]) }}"
				method="put"
				:item="$item"
				:collectionType="$collectionType"
				btnStyle="primary"
				btnIcon="fa-up-from-bracket"
				btnText="Update"
			/>
		</div>
	</x-slot:main>

</x-layouts::admin>