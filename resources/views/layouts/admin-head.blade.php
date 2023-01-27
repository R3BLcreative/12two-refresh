@aware(['seo'])

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="robots" content="noindex, nofollow">

	<title>{{ $seo['title'] }}</title>

	<link rel="preconnect" href="https://kit.fontawesome.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	{{-- FAV/SHORTCUT ICONS --}}
	<link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
	<link rel="manifest" href="./site.webmanifest">

	<script src="https://kit.fontawesome.com/406a508ef0.js" crossorigin="anonymous"></script>

	<!-- Scripts & Styles -->
	@vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>