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
			item.style.height = '100vh';
			toggle.innerHTML =
				'<svg class="w-full h-auto" id="icon-cancel" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z" class="fill-inherit"/><path d="M18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289Z" class="fill-inherit"/></svg>';
		} else {
			item.style = '';
			toggle.innerHTML =
				'<svg class="w-full h-auto" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2 5C2 4.44772 2.44772 4 3 4H21C21.5523 4 22 4.44772 22 5C22 5.55228 21.5523 6 21 6H3C2.44772 6 2 5.55228 2 5Z" class="fill-inherit"/><path d="M2 12C2 11.4477 2.44772 11 3 11H21C21.5523 11 22 11.4477 22 12C22 12.5523 21.5523 13 21 13H3C2.44772 13 2 12.5523 2 12Z" class="fill-inherit"/><path d="M2 19C2 18.4477 2.44772 18 3 18H21C21.5523 18 22 18.4477 22 19C22 19.5523 21.5523 20 21 20H3C2.44772 20 2 19.5523 2 19Z" class="fill-inherit"/></svg>';
		}
	}

	function toggleClose(toggle, item) {
		toggle.setAttribute('aria-expanded', 'false');
		item.setAttribute('aria-expanded', 'false');
		item.style = '';
		toggle.innerHTML =
			'<svg class="w-full h-auto" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2 5C2 4.44772 2.44772 4 3 4H21C21.5523 4 22 4.44772 22 5C22 5.55228 21.5523 6 21 6H3C2.44772 6 2 5.55228 2 5Z" class="fill-inherit"/><path d="M2 12C2 11.4477 2.44772 11 3 11H21C21.5523 11 22 11.4477 22 12C22 12.5523 21.5523 13 21 13H3C2.44772 13 2 12.5523 2 12Z" class="fill-inherit"/><path d="M2 19C2 18.4477 2.44772 18 3 18H21C21.5523 18 22 18.4477 22 19C22 19.5523 21.5523 20 21 20H3C2.44772 20 2 19.5523 2 19Z" class="fill-inherit"/></svg>';
	}
});
