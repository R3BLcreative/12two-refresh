/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./resources/views/**/**/*.blade.php',
		'./app/Http/Controllers/**/*.php',
		'./config/setting_fields.php',
	],
	theme: {
		screens: {
			mobile: '0px',
			tablet: '767px',
			laptop: '991px',
			desktop: '1281px',
		},
		fontFamily: {
			sans: ['Poppins', 'sans-serif'],
			serif: ['noto-serif', 'serif'],
		},
		extend: {
			colors: {
				primary: {
					100: '#0042c6', //magicBlue
					200: '#00247f', //seaBlue
					300: '#00002c', //midnightBlue
				},
				secondary: {
					100: '#21dbbc', //green
				},
				tertiary: {
					200: '#cc3e3f', //red
					400: '#7b160f', //red
					500: '4d0d09', //red
				},
				surface: {
					50: '#ffffff', //white
					100: '#fafafa', //grey
					200: '#f0f0f0', //grey
					300: '#ededed', //grey
					400: '#bbbbbb', //grey
				},
				body: {
					50: '#616161', //grey
					100: '#404040', //grey
				},
				alert: {
					100: '#cc3e3f', //red
				},
				warning: {
					100: '#ffa000', //orange
				},
				success: {
					100: '#00805a', //green
				},
				accent: {
					100: '#6cceff', //skyBlue
					200: '#4126cd', //purple
					300: '#ff5e4d', //salmon
					400: '#FFEC7F', //yellow
				},
			},
		},
	},
	corePlugins: {
		aspectRatio: false,
	},
	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/line-clamp'),
		require('@tailwindcss/typography'),
	],
};
