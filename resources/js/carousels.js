import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// All carousel's with nav's should have the same nav items
const carouselPrevBtns = document.querySelectorAll('.carousel-prev');
const carouselNextBtns = document.querySelectorAll('.carousel-next');

if (carouselPrevBtns.length > 0 && carouselNextBtns.length > 0) {
	carouselPrevBtns.forEach((prevBtn) => {
		prevBtn.addEventListener('click', (e) => {
			carouselPrevGo(e);
		});
	});

	carouselNextBtns.forEach((nextBtn) => {
		nextBtn.addEventListener('click', (e) => {
			carouselNextGo(e);
		});
	});
}

function carouselPrevGo(e) {
	var btn = e.target || e.srcElement;
	const carouselEl = btn.getAttribute('aria-controls');
	const carousel = document.querySelector('#' + carouselEl).swiper;
	carousel.slidePrev();
}

function carouselNextGo(e) {
	var btn = e.target || e.srcElement;
	const carouselEl = btn.getAttribute('aria-controls');
	const carousel = document.querySelector('#' + carouselEl).swiper;
	carousel.slideNext();
}

// PRODUCT CAROUSEL - HOME PAGE -----------------------------------------
const product = new Swiper('.product-carousel', {
	keyboard: {
		enabled: true,
	},
	autoplay: {
		delay: 5000,
	},
	loop: true,
	slidesPerView: 1,
	spaceBetween: 10,
	speed: 400,
	breakpoints: {
		767: {
			slidesPerView: 2,
			spaceBetween: 24,
		},
		991: {
			slidesPerView: 3,
			spaceBetween: 32,
		},
	},
});

// SOCIAL PROOF CAROUSELS --------------------------------------------
const socialProof = new Swiper('.social-proof-carousel', {
	autoplay: {
		delay: 0,
	},
	loop: true,
	slidesPerView: 1,
	spaceBetween: 10,
	speed: 2000,
	breakpoints: {
		767: {
			slidesPerView: 2,
			spaceBetween: 24,
		},
		991: {
			slidesPerView: 3,
			spaceBetween: 32,
		},
	},
});

// OWNER SHOWCASE CAROUSEL - HOME PAGE -----------------------------------------
const testimonials = new Swiper('.testimonial-carousel', {
	keyboard: {
		enabled: true,
	},
	autoplay: {
		delay: 5000,
	},
	loop: true,
	slidesPerView: 1,
	spaceBetween: 10,
	speed: 400,
});
