/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors');

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
			body: ['Source Sans Pro', 'sans-serif'],
			heading: ['Oswald', 'sans-serif'],
		},
		extend: {
			colors: {
				primary: {
					50: 'hsl(358, 82%, 77%)',
					100: 'hsl(358, 82%, 67%)',
					200: 'hsl(358, 82%, 57%)',
					300: 'hsl(358, 82%, 47%)',
					400: 'hsl(358, 82%, 40%)',
					500: 'hsl(358, 82%, 37%)',
					600: 'hsl(358, 82%, 30%)',
					700: 'hsl(358, 82%, 27%)',
					800: 'hsl(358, 82%, 20%)',
					900: 'hsl(358, 82%, 17%)',
				},
				secondary: {
					50: 'hsl(45, 97%, 90%)',
					100: 'hsl(45, 97%, 80%)',
					200: 'hsl(45, 97%, 70%)',
					300: 'hsl(45, 97%, 60%)',
					400: 'hsl(45, 97%, 55%)',
					500: 'hsl(45, 97%, 50%)',
					600: 'hsl(45, 97%, 40%)',
					700: 'hsl(45, 97%, 30%)',
					800: 'hsl(45, 97%, 20%)',
					900: 'hsl(45, 97%, 10%)',
				},
				surface: {
					50: 'hsl(0, 0%, 98%)',
					100: 'hsl(0, 0%, 80%)',
					200: 'hsl(0, 0%, 70%)',
					300: 'hsl(0, 0%, 60%)',
					400: 'hsl(0, 0%, 55%)',
					500: 'hsl(0, 0%, 50%)',
					600: 'hsl(0, 0%, 40%)',
					700: 'hsl(0, 0%, 30%)',
					800: 'hsl(0, 0%, 20%)',
					900: 'hsl(0, 0%, 10%)',
				},
				body: {
					50: 'hsl(0, 0%, 98%)',
					100: 'hsl(0, 0%, 80%)',
					200: 'hsl(0, 0%, 70%)',
					300: 'hsl(0, 0%, 60%)',
					400: 'hsl(0, 0%, 55%)',
					500: 'hsl(0, 0%, 50%)',
					600: 'hsl(0, 0%, 40%)',
					700: 'hsl(0, 0%, 30%)',
					800: 'hsl(0, 0%, 20%)',
					900: 'hsl(0, 0%, 10%)',
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
