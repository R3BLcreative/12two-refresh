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
					// #AB1E22
					50: 'hsl(358, 70%, 79%)',
					100: 'hsl(358, 70%, 69%)',
					200: 'hsl(358, 70%, 59%)',
					300: 'hsl(358, 70%, 49%)',
					400: 'hsl(358, 70%, 30%)',
					500: 'hsl(358, 70%, 39%)',
					600: 'hsl(358, 70%, 30%)',
					700: 'hsl(358, 70%, 29%)',
					800: 'hsl(358, 70%, 20%)',
					900: 'hsl(358, 70%, 19%)',
					accent: {
						// #58AB27
						50: 'hsl(98, 63%, 91%)',
						100: 'hsl(98, 63%, 81%)',
						200: 'hsl(98, 63%, 71%)',
						300: 'hsl(98, 63%, 61%)',
						400: 'hsl(98, 63%, 51%)',
						500: 'hsl(98, 63%, 41%)',
						600: 'hsl(98, 63%, 31%)',
						700: 'hsl(98, 63%, 21%)',
						800: 'hsl(98, 63%, 16%)',
						900: 'hsl(98, 63%, 11%)',
					},
				},
				secondary: {
					// #FFC107
					50: 'hsl(45, 100%, 90%)',
					100: 'hsl(45, 100%, 80%)',
					200: 'hsl(45, 100%, 70%)',
					300: 'hsl(45, 100%, 60%)',
					400: 'hsl(45, 100%, 56%)',
					500: 'hsl(45, 100%, 51%)',
					600: 'hsl(45, 100%, 40%)',
					700: 'hsl(45, 100%, 30%)',
					800: 'hsl(45, 100%, 20%)',
					900: 'hsl(45, 100%, 10%)',
					accent: {
						// #14BAFF
						50: 'hsl(198, 100%, 90%)',
						100: 'hsl(198, 100%, 80%)',
						200: 'hsl(198, 100%, 70%)',
						300: 'hsl(198, 100%, 60%)',
						400: 'hsl(198, 100%, 58%)',
						500: 'hsl(198, 100%, 54%)',
						600: 'hsl(198, 100%, 40%)',
						700: 'hsl(198, 100%, 30%)',
						800: 'hsl(198, 100%, 20%)',
						900: 'hsl(198, 100%, 10%)',
					},
				},
				surface: {
					// Grayscale
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
					// Grayscale
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
				error: {
					// #CC3E3F
					50: '',
					100: '#cc3e3f',
				},
				warning: {
					// #FFA000
					100: '#ffa000',
				},
				notice: {
					// #00805A
					100: '#00805a',
				},
			},
			boxShadow: {
				sm: '0 1px 2px 0 rgb(0 0 0 / 0.75)',
				DEFAULT:
					'0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.75)',
				md: '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.75)',
				lg: '0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.75)',
				xl: '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.75)',
				'2xl': '0 25px 50px -12px rgb(0 0 0 / 0.75)',
				inner: 'inset 0 2px 4px 0 rgb(0 0 0 / 0.75)',
			},
			dropShadow: {
				sm: '0 1px 1px rgb(0 0 0 / 0.4)',
				DEFAULT: ['0 1px 2px rgb(0 0 0 / 0.1)', '0 1px 1px rgb(0 0 0 / 0.4)'],
				md: ['0 4px 3px rgb(0 0 0 / 0.07)', '0 2px 2px rgb(0 0 0 / 0.4)'],
				lg: ['0 10px 8px rgb(0 0 0 / 0.04)', '0 4px 3px rgb(0 0 0 / 0.4)'],
				xl: ['0 20px 13px rgb(0 0 0 / 0.03)', '0 8px 5px rgb(0 0 0 / 0.4)'],
				'2xl': '0 25px 25px rgb(0 0 0 / 0.4)',
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
