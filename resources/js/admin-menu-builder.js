import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', function () {
	// DOM ELEMENTS
	const mbuilder = document.querySelector('#menu-builder');

	if (mbuilder) {
		const destroyBtns = mbuilder.querySelectorAll('button.remove-menu-item');
		const createBtns = mbuilder.querySelectorAll('button.add-menu-item');
		const linkSelects = mbuilder.querySelectorAll('.link-select select');

		// SORTABLE UI
		var sortableMenu = new Sortable(mbuilder, {
			handle: '.handle',
			group: 'menu-builder',
			draggable: 'li',
			onSort: (e) => {
				reindex_field_names();
			},
		});

		// DESTROY ITEMS
		const destroy = (el) => {
			el.addEventListener('click', (e) => {
				const el = e.currentTarget;
				const parent = el.parentElement;
				const li = parent.parentElement;
				const builder = document.querySelector('#menu-builder');

				// Remove element
				li.remove();

				// Toggle first minus visibility
				const items = builder.querySelectorAll('li');
				if (items.length < 2) {
					let btn = items[0].querySelector('button.remove-menu-item');
					btn.classList.add('group-first:hidden');
				}

				// Update field names
				reindex_field_names();
			});
		};
		destroyBtns.forEach((el) => {
			destroy(el);
		});

		// CREATE ITEMS
		const create = (el) => {
			el.addEventListener('click', (e) => {
				const el = e.currentTarget;
				const parent = el.parentElement;
				const current = parent.parentElement;
				const builder = document.querySelector('#menu-builder');
				const clone = current.cloneNode(true);

				// Clear values and update names
				let inputs = clone.querySelectorAll('input');
				inputs.forEach((el) => {
					el.value = '';
				});
				let selects = clone.querySelectorAll('select');
				selects.forEach((el) => {
					el.value = '';
				});
				let urlField = clone.querySelector('.url-field');
				let input = urlField.querySelector('input');
				input.value = '';
				input.setAttribute('type', 'hidden');
				let span = urlField.querySelector('span');
				span.innerHTML = '';

				// Set event listeners
				const destroyBtn = clone.querySelector('button.remove-menu-item');
				destroy(destroyBtn);
				const createBtn = clone.querySelector('button.add-menu-item');
				create(createBtn);
				const linkSelect = clone.querySelector('.link-select select');
				toggle_url_field(linkSelect);

				// Insert
				builder.insertBefore(clone, current.nextSibling);

				// Toggle first minus visibility
				const items = builder.querySelectorAll('li');
				if (items.length > 1) {
					let btn = items[0].querySelector('button.remove-menu-item');
					btn.classList.remove('group-first:hidden');
				}

				// Update field names
				reindex_field_names();
			});
		};
		createBtns.forEach((el) => {
			create(el);
		});

		// ENABLE/DISABLE URL FIELDS
		const toggle_url_field = (el) => {
			el.addEventListener('change', (e) => {
				const el = e.currentTarget;
				const parent = el.parentElement;
				const current = parent.parentElement;
				const urlField = current.querySelector('.url-field');
				const input = urlField.querySelector('input');
				const span = urlField.querySelector('span');

				if (el.value == 'custom') {
					input.setAttribute('type', 'text');
					input.value = ''; // Clear previous value if present
					span.innerHTML = '';
				} else {
					input.setAttribute('type', 'hidden');
					input.value = el.value;
					span.innerHTML = el.value;
				}
			});
		};
		linkSelects.forEach((el) => {
			toggle_url_field(el);
		});

		// RE-INDEX FIELD NAMES
		const reindex_field_names = () => {
			const builder = document.querySelector('#menu-builder');
			const items = builder.querySelectorAll('li');

			items.forEach((el, i) => {
				let label = el.querySelector('#label');
				label.setAttribute('name', 'menu_items[' + i + '][label]');
				let target = el.querySelector('#target');
				target.setAttribute('name', 'menu_items[' + i + '][target]');
				let link = el.querySelector('#link');
				link.setAttribute('name', 'menu_items[' + i + '][link]');
				let url = el.querySelector('#url');
				url.setAttribute('name', 'menu_items[' + i + '][url]');
			});
		};
	}
});
