@aware(['seo'])

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- SEO OpenGraph and Meta --}}
	@if($seo['indexing'] === false)
	<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	@else
	<meta name="robots" content="noindex, nofollow">
	@endif

	<title>{{ $seo['title'] }}</title>

	<link rel="canonical" href="{{ request()->url() }}">

	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{ $seo['title'] }}">
	<meta property="og:description" content="{{ $seo['desc'] }}">
	<meta property="og:url" content="{{ request()->url() }}">
	<meta property="og:site_name" content="{{ $seo['name'] }}">
	<meta property="article:publisher" content="">
	<meta property="article:modified_time" content="">
	<meta property="og:image" content="">
	<meta property="og:image:width" content="">
	<meta property="og:image:height" content="">
	<meta property="og:image:type" content="">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="">
	{{-- END SEO OpenGraph and Meta --}}

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

	{{-- FAV/SHORTCUT ICONS --}}
	<link rel="icon" type="image/x-icon" href="./favicon.ico">

	<!-- Scripts & Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>