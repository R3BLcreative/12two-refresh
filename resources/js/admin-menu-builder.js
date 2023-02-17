import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', function () {
	const toggles = document.querySelectorAll('.menu-builder-option-toggle');
	const options = document.querySelectorAll('.sortable-options');
	const builder = document.querySelector('#menu-builder');

	// COLLECTION ITEMS TOGGLES
	toggles.forEach((el) => {
		el.addEventListener('click', (e) => {
			var toggle = e.target;
			var parent = toggle.parentElement;

			// Toggle aria-expanded
			parent.setAttribute(
				'aria-expanded',
				!(parent.getAttribute('aria-expanded') === 'true')
			);

			// Toggle tabindex
			var options = parent.querySelectorAll('li');
			options.forEach((el) => {
				if (parent.getAttribute('aria-expanded') === 'true') {
					el.setAttribute('tabindex', '0');
				} else {
					el.setAttribute('tabindex', '-1');
				}
			});
		});
	});

	// SORTABLE UI
	options.forEach((el) => {
		var srtbl = new Sortable(el, {
			group: 'menu-builder',
			sort: false,
			draggable: 'li',
		});
	});

	var bldr = new Sortable(builder, {
		group: 'menu-builder',
		draggable: 'li',
	});

	// Beginning of code for managing nested lists inside the builder
	// var bldrItems = builder.querySelectorAll('li');
	// bldrItems.forEach((el) => {
	// 	var srtbl = new Sortable(el, {
	// 		group: 'nested',
	// 		fallbackOnBody: true,
	// 	});
	// });
});
