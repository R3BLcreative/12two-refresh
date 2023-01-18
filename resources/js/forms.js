export const moneyMask = (value) => {
	value = value.replace('.', '').replace(',', '').replace(/\D/g, '');

	const options = {
		minimumFractionDigits: 2,
		currency: 'USD',
	};
	const result = new Intl.NumberFormat('en-latn', options).format(
		parseFloat(value) / 100
	);

	// console.log(result);

	return '$' + result;
};

document.addEventListener('DOMContentLoaded', function () {
	// Calculate processing fee
	const fee = 0.05;
	const inputAmount = document.querySelector('#amount');
	const displayFee = document.querySelector('#ccFeeDisplay');
	const inputFee = document.querySelector('#ccfee');
	inputAmount.addEventListener('keyup', (e) => {
		let amount = e.target.value
			.replace(',', '')
			.replace('$', '')
			.replace('.', '');

		let feeAmount = amount * fee;
		inputFee.value = moneyMask(feeAmount.toString());
		displayFee.value = moneyMask(feeAmount.toString());
	});

	// INPUT MASKING

	// Currency input masking
	let inputUSD = document.querySelector("input[data-type='currency']");
	inputUSD.addEventListener('keyup', (e) => {
		e.target.value = moneyMask(e.target.value);
	});

	// This code empowers all input tags having a placeholder and data-slots attribute for masking
	for (const el of document.querySelectorAll('[placeholder][data-slots]')) {
		const pattern = el.getAttribute('placeholder'),
			slots = new Set(el.dataset.slots || '_'),
			prev = ((j) =>
				Array.from(pattern, (c, i) => (slots.has(c) ? (j = i + 1) : j)))(0),
			first = [...pattern].findIndex((c) => slots.has(c)),
			accept = new RegExp(el.dataset.accept || '\\d', 'g'),
			clean = (input) => {
				input = input.match(accept) || [];
				return Array.from(pattern, (c) =>
					input[0] === c || slots.has(c) ? input.shift() || c : c
				);
			},
			format = () => {
				const [i, j] = [el.selectionStart, el.selectionEnd].map((i) => {
					i = clean(el.value.slice(0, i)).findIndex((c) => slots.has(c));
					return i < 0
						? prev[prev.length - 1]
						: back
						? prev[i - 1] || first
						: i;
				});
				el.value = clean(el.value).join``;
				el.setSelectionRange(i, j);
				back = false;
			};
		let back = false;
		el.addEventListener('keydown', (e) => (back = e.key === 'Backspace'));
		el.addEventListener('input', format);
		el.addEventListener('focus', format);
		el.addEventListener('blur', () => el.value === pattern && (el.value = ''));
	}

	// FORM DEPENDENCIES & OTHER FEATURES
	for (const container of document.querySelectorAll('[data-hasDeps]')) {
		const toggles = container.querySelectorAll('[data-deps]');
		for (const toggle of toggles) {
			const item = container.querySelector(
				'#' + toggle.getAttribute('aria-controls')
			);
			toggle.addEventListener('click', (e) => {
				toggleDeps(toggle, item, toggles, container);
			});
		}
	}

	function toggleDeps(toggle, item, toggles, container) {
		var otherDeps = container.querySelectorAll('input[data-deps]');
		var checkedDeps = container.querySelectorAll('input[data-deps]:checked');
		var isExpanded = toggle.getAttribute('aria-expanded') === 'true';

		if (isExpanded === true && otherDeps.length == 1) {
			toggles.forEach((tog) => tog.setAttribute('aria-expanded', 'false'));
			item.setAttribute('aria-expanded', 'false');
			item.style.maxHeight = '0px';
			item.style.opacity = '0';
		} else if (
			isExpanded === true &&
			otherDeps.length > 1 &&
			checkedDeps.length == 0
		) {
			toggles.forEach((tog) => tog.setAttribute('aria-expanded', 'false'));
			item.setAttribute('aria-expanded', 'false');
			item.style.maxHeight = '0px';
			item.style.opacity = '0';
		} else {
			toggles.forEach((tog) => tog.setAttribute('aria-expanded', 'true'));
			item.setAttribute('aria-expanded', 'true');
			item.style.maxHeight = '500px';
			item.style.opacity = '1';
		}
	}

	// Textarea char counter and limiter
	for (const el of document.querySelectorAll('textarea[data-max]')) {
		const max = el.dataset.max;
		const counter = document.querySelector('#' + el.dataset.counter);

		const limitChars = () => {
			if (el.value.length > max) {
				el.value = el.value.substring(0, max);
			}

			let chars = el.value.length;
			let count = chars;
			counter.textContent = count + '/' + max;

			if (count > Math.ceil(max * 0.3) && count < Math.ceil(max * 0.6)) {
				counter.style.color = 'green';
			} else if (count > Math.ceil(max * 0.6) && count < Math.ceil(max * 0.9)) {
				counter.style.color = 'orange';
			} else if (count > Math.ceil(max * 0.9)) {
				counter.style.color = 'red';
			} else {
				counter.style.color = 'inherit';
			}
		};

		el.addEventListener('input', limitChars);
	}
});
