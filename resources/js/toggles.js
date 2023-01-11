document.addEventListener('DOMContentLoaded', function () {
	const toggles = document.querySelectorAll('.toggle');
	if (toggles.length > 0) {
		toggles.forEach((toggle) => {
			const itemID = toggle.dataset.controls;
			const item = document.querySelector(itemID);

			// Click Event
			toggle.addEventListener('click', (e) => {
				e.preventDefault();
				toggler(toggle, item);
			});

			// Escape key to close all toggles
			toggle.addEventListener('keyup', function (e) {
				if (e.key === 'Escape') {
					toggleClose(toggle, item);
				}
			});

			// Window resize closes all toggles
			window.addEventListener('resize', function (e) {
				toggleClose(toggle, item);
			});
		});
	}

	function toggler(toggle, item) {
		const itemType = toggle.dataset.type;

		toggleAriaExpanded(toggle, item);

		switch (itemType) {
			case 'nav':
				toggleNav(toggle, item);
				break;

			default:
				break;
		}
	}

	function toggleAriaExpanded(toggle, item) {
		var isExpanded = item.getAttribute('aria-expanded') === 'true';
		toggle.setAttribute('aria-expanded', !isExpanded);
		item.setAttribute('aria-expanded', !isExpanded);
	}

	function toggleNav(toggle, item) {
		var isExpanded = item.getAttribute('aria-expanded') === 'true';

		if (isExpanded) {
			item.style.height = '85vh';
			toggle.innerHTML = '<i class="fa-regular fa-xmark fa-2xl"></i>';
		} else {
			item.style = '';
			toggle.innerHTML = '<i class="fa-light fa-bars fa-2xl"></i>';
		}
	}

	function toggleClose(toggle, item) {
		toggle.setAttribute('aria-expanded', 'false');
		item.setAttribute('aria-expanded', 'false');
		item.style = '';
		toggle.innerHTML = '<i class="fa-light fa-bars fa-2xl"></i>';
	}
});
