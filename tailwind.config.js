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
					DEFAULT: '#AB1E22',
					50: '#EC9497',
					100: '#E98386',
					200: '#E36064',
					300: '#DD3E42',
					400: '#CE2429',
					500: '#AB1E22',
					600: '#7B1619',
					700: '#4C0D0F',
					800: '#410B0D',
					900: '#2B0809',
					accent: {
						DEFAULT: '#1A96CB',
						50: '#A9DDF4',
						100: '#97D6F2',
						200: '#72C8ED',
						300: '#4EBAE8',
						400: '#2AACE4',
						500: '#1A96CB',
						600: '#147199',
						700: '#0D4D68',
						800: '#0A3C51',
						900: '#062532',
					},
				},
				secondary: {
					DEFAULT: '#FFC107',
					50: '#FFEFBF',
					100: '#FFEAAA',
					200: '#FFE081',
					300: '#FFD559',
					400: '#FFCB30',
					500: '#FFC107',
					600: '#CE9A00',
					700: '#967000',
					800: '#5E4600',
					900: '#261C00',
					accent: {
						DEFAULT: '#58AB27',
						50: '#BBE9A0',
						100: '#B0E690',
						200: '#98DE6E',
						300: '#80D64D',
						400: '#69CC2F',
						500: '#58AB27',
						600: '#407D1D',
						700: '#295012',
						800: '#203E0E',
						900: '#152A09',
					},
				},
				surface: {
					// Grayscale
					50: 'hsl(0, 0%, 98%)',
					100: 'hsl(0, 0%, 88%)',
					200: 'hsl(0, 0%, 78%)',
					300: 'hsl(0, 0%, 68%)',
					400: 'hsl(0, 0%, 58%)',
					500: 'hsl(0, 0%, 50%)',
					600: 'hsl(0, 0%, 48%)',
					700: 'hsl(0, 0%, 30%)',
					800: 'hsl(0, 0%, 25%)',
					900: 'hsl(0, 0%, 18%)',
				},
				body: {
					// Grayscale
					50: 'hsl(0, 0%, 98%)',
					100: 'hsl(0, 0%, 88%)',
					200: 'hsl(0, 0%, 78%)',
					300: 'hsl(0, 0%, 68%)',
					400: 'hsl(0, 0%, 58%)',
					500: 'hsl(0, 0%, 50%)',
					600: 'hsl(0, 0%, 48%)',
					700: 'hsl(0, 0%, 30%)',
					800: 'hsl(0, 0%, 25%)',
					900: 'hsl(0, 0%, 18%)',
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
				inner: 'inset 0 2px 4px 0 rgb(0 0 0 / 0.25)',
				float: '0 0 4px 2px rgb(0 0 0 / 0.5)',
			},
			dropShadow: {
				sm: '0 1px 1px rgb(0 0 0 / 0.4)',
				DEFAULT: ['0 1px 2px rgb(0 0 0 / 0.1)', '0 1px 1px rgb(0 0 0 / 0.4)'],
				md: ['0 4px 3px rgb(0 0 0 / 0.07)', '0 2px 2px rgb(0 0 0 / 0.4)'],
				lg: ['0 10px 8px rgb(0 0 0 / 0.04)', '0 4px 3px rgb(0 0 0 / 0.4)'],
				xl: ['0 20px 13px rgb(0 0 0 / 0.03)', '0 8px 5px rgb(0 0 0 / 0.4)'],
				'2xl': '0 25px 25px rgb(0 0 0 / 0.4)',
			},
			backgroundImage: {
				'map-dark': "url('./images/bkg_map_dark.png')",
				'map-light': "url('./images/bkg_map_light.png')",
				'map-white': "url('./images/bkg_map_white.png')",
				'haiti-lookout': "url('./images/bkg_haiti_lookout.jpg')",
				horizon: "url('./images/bkg_horizon.jpg')",
				'horizon-dark': "url('./images/bkg_horizon_dark.jpg')",
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
