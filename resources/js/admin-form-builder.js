import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', function () {
	// DOM ELEMENTS
	const fbuilder = document.querySelector('#form-builder');

	if (fbuilder) {
		// SORTABLE UI
		var sortableField = new Sortable(fbuilder, {
			handle: '.handle',
			group: 'form-builder',
			draggable: 'li',
			onSort: (e) => {
				reindex_items();
			},
		});

		// -------------------------------------------------------

		// CREATE ITEMS
		const create = (el) => {
			el.addEventListener('click', (e) => {
				const el = e.currentTarget;
				const parent = el.parentElement.parentElement.parentElement;
				const builder = document.querySelector('#form-builder');
				const clone = parent.cloneNode(true);

				// Clear values
				let inputs = clone.querySelectorAll('input');
				inputs.forEach((el) => {
					el.value = '';
				});
				let selects = clone.querySelectorAll('select');
				selects.forEach((el) => {
					el.value = '';
				});
				let item_label = clone.querySelector('.item-label');
				item_label.innerHTML = '';
				let item_type = clone.querySelector('.item-type');
				item_type.innerHTML = '';

				// Set event listeners
				const destroyBtn = clone.querySelector('button.remove-field-item');
				destroy(destroyBtn);
				const createBtn = clone.querySelector('button.add-field-item');
				create(createBtn);
				const toggleBtn = clone.querySelector('button.toggle-field-settings');
				toggleBtn.setAttribute('aria-expanded', 'false');
				toggle_settings(toggleBtn);
				const fldSettings = clone.querySelector('.field-settings');
				fldSettings.setAttribute('aria-expanded', 'false');
				const labelFld = clone.querySelector('.field-label input');
				update_item_label(labelFld);
				const typeFld = clone.querySelector('.field-type select');
				update_item_type(typeFld);

				// Insert
				builder.insertBefore(clone, parent.nextSibling);

				// Toggle first minus visibility
				const items = builder.querySelectorAll('li');
				if (items.length > 1) {
					items.forEach((el) => {
						let btn = el.querySelector('button.remove-field-item');
						btn.classList.remove('group-first:hidden');
					});
				}

				// Reindex
				reindex_items();
			});
		};

		// DESTROY ITEMS
		const destroy = (el) => {
			el.addEventListener('click', (e) => {
				const el = e.currentTarget;
				const parent = el.parentElement.parentElement.parentElement;
				const builder = document.querySelector('#form-builder');

				// Remove element
				parent.remove();

				// Toggle first minus visibility
				const items = builder.querySelectorAll('li');
				if (items.length < 2) {
					let btn = items[0].querySelector('button.remove-field-item');
					btn.classList.add('group-first:hidden');
				}

				// Reindex
				reindex_items();
			});
		};

		// REINDEX ITEMS ON CHANGE
		const reindex_items = () => {
			const builder = document.querySelector('#form-builder');
			const items = builder.querySelectorAll('li');

			items.forEach((el, i) => {
				let label = el.querySelector('#label');
				label.setAttribute('name', 'form_fields[' + i + '][label]');
				let type = el.querySelector('#type');
				type.setAttribute('name', 'form_fields[' + i + '][type]');
				let classf = el.querySelector('#class');
				classf.setAttribute('name', 'form_fields[' + i + '][class]');
				let toggle = el.querySelector('.toggle-field-settings');
				toggle.setAttribute('aria-controls', 'field_' + i + '_settings');
				let settings = el.querySelector('.field-settings');
				settings.setAttribute('id', 'field_' + i + '_settings');
			});
		};

		// TOGGLE FIELD SETTINGS
		const toggle_settings = (el) => {
			el.addEventListener('click', (e) => {
				e.preventDefault();

				// Toggle current item
				const current = e.currentTarget;
				const controls = current.getAttribute('aria-controls');
				const settings = document.querySelector('#' + controls);

				// Close others first if opening current
				if (!(current.getAttribute('aria-expanded') == 'true')) {
					const builder = document.querySelector('#form-builder');
					const items = builder.querySelectorAll(
						'button.toggle-field-settings[aria-expanded="true"]'
					);

					items.forEach((toggle) => {
						const tcontrols = toggle.getAttribute('aria-controls');
						const tsettings = document.querySelector('#' + tcontrols);

						// Toggle aria-expanded of toggle element
						toggle.setAttribute(
							'aria-expanded',
							!(toggle.getAttribute('aria-expanded') == 'true')
						);

						// Toggle aria-expanded of settings element
						tsettings.setAttribute(
							'aria-expanded',
							!(tsettings.getAttribute('aria-expanded') == 'true')
						);
					});
				}

				// Toggle aria-expanded of current toggle element
				current.setAttribute(
					'aria-expanded',
					!(current.getAttribute('aria-expanded') == 'true')
				);

				// Toggle aria-expanded of current settings element
				settings.setAttribute(
					'aria-expanded',
					!(settings.getAttribute('aria-expanded') == 'true')
				);
			});
		};

		// UPDATE ITEM LABEL WITH FIELD LABEL ON CHANGE
		const update_item_label = (el) => {
			el.addEventListener('keyup', (e) => {
				const el = e.currentTarget;
				const label = el.value;

				// Get parent li element
				const parent =
					el.parentElement.parentElement.parentElement.parentElement;

				// Get item label element
				const item = parent.querySelector('.item-label');
				item.innerHTML = label;
			});
		};

		// UPDATE ITEM TYPE WITH FIELD TYPE ON CHANGE
		const update_item_type = (el) => {
			el.addEventListener('change', (e) => {
				const el = e.currentTarget;
				const type = el.value;

				// Get parent li element
				const parent =
					el.parentElement.parentElement.parentElement.parentElement;

				// Get item type element
				const item = parent.querySelector('.item-type');
				item.innerHTML = '(' + type + ')';
			});
		};

		// -------------------------------------------------------

		const destroyBtns = fbuilder.querySelectorAll('button.remove-field-item');
		const createBtns = fbuilder.querySelectorAll('button.add-field-item');
		const toggleBtns = fbuilder.querySelectorAll(
			'button.toggle-field-settings'
		);
		const labelFlds = fbuilder.querySelectorAll('.field-label input');
		const typeFlds = fbuilder.querySelectorAll('.field-type select');

		destroyBtns.forEach((el) => {
			destroy(el);
		});

		createBtns.forEach((el) => {
			create(el);
		});

		toggleBtns.forEach((el) => {
			toggle_settings(el);
		});

		labelFlds.forEach((el) => {
			update_item_label(el);
		});

		typeFlds.forEach((el) => {
			update_item_type(el);
		});
	}
});
