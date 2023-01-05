document.addEventListener('DOMContentLoaded', function () {
	const cookieStorage = {
		getItem: (key) => {
			const cookies = document.cookie
				.split(';')
				.map((cookie) => cookie.split('='))
				.reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value }), {});
			return cookies[key];
		},
		setItem: (key, value) => {
			const expire = new Date(
				new Date().getTime() + 1000 * 60 * 60 * 24 * 365
			).toGMTString();

			const prod = ['helloalice.com'];
			if (prod.includes(location.hostname)) {
				document.cookie = `${key}=${value};domain=.helloalice.com;expires=${expire};path=/;SameSite=Lax;Secure;`;
			} else {
				document.cookie = `${key}=${value};expires=${expire};path=/;SameSite=Lax;Secure;`;
			}
		},
	};
	const storageType = cookieStorage;
	const consentPropertyName = 'CookieConsent';

	const showConsentPopup = () => !storageType.getItem(consentPropertyName);
	const saveToStorage = () => storageType.setItem(consentPropertyName, true);

	window.onload = () => {
		const consentPopup = document.getElementById('cookies-consent-popup');
		const acceptAll = document.getElementById('accept-cookies-all');

		const acceptFn = (event) => {
			event.preventDefault();
			saveToStorage(storageType);
			consentPopup.classList.add('opacity-0');
			consentPopup.classList.add('translate-y-full');
		};

		acceptAll.addEventListener('click', acceptFn);

		if (showConsentPopup()) {
			setTimeout(() => {
				consentPopup.classList.remove('opacity-0');
				consentPopup.classList.remove('translate-y-full');
			}, 1000);
		}
	};
});
