console.log('12TWO MISSIONS FRONTEND - VERSION 1.0');

import './bootstrap';
import './carousels';
import './toggles';
import './cookie-consent';
import './counters';
import './forms';

document.addEventListener('DOMContentLoaded', function () {
	// SKIP TO MAIN CONTENT BUTTON --------------------------------
	const skipToMain = document.querySelector('#skip-to-main');
	skipToMain.addEventListener('click', function () {
		document.location += '#content';
		return false;
	});
});
