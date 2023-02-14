console.log(`

  _ ___ _______      _____    __  __ ___ ___ ___ ___ ___  _  _ ___ 
 / |_  )_   _\\ \\    / / _ \\  |  \\/  |_ _/ __/ __|_ _/ _ \\| \\| / __|
 | |/ /  | |  \\ \\/\\/ / (_) | | |\\/| || |\\__ \\__ \\| | (_) | .\` \\__ \\
 |_/___| |_|   \\_/\\_/ \\___/  |_|  |_|___|___/___/___\\___/|_|\\_|___/   v1.0


`);

import './bootstrap';
import './carousels';
import './toggles';
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
