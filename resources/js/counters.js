document.addEventListener('DOMContentLoaded', function () {
	const counters = document.querySelectorAll('.counter');

	counters.forEach((counter) => {
		const animate = () => {
			const value = +counter.dataset.value;
			const speed = counter.dataset.speed;
			const data = +counter.innerText;

			const time = value / speed;
			if (data < value) {
				counter.innerText = Math.ceil(data + time);
				setTimeout(animate, 1);
			} else {
				counter.innerText = value;
			}
		};

		animate();
	});
});
