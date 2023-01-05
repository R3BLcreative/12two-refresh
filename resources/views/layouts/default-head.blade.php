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
	<meta property="article:publisher" content="https://www.facebook.com/AliceConnects">
	<meta property="article:modified_time" content="">
	<meta property="og:image" content="">
	<meta property="og:image:width" content="">
	<meta property="og:image:height" content="">
	<meta property="og:image:type" content="">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@HelloAlice">
	{{-- END SEO OpenGraph and Meta --}}

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://dykt6xofqo07l.cloudfront.net">
	<link rel="preconnect" href="https://use.typekit.net">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.typekit.net/zys0act.css">

	{{-- FAV/SHORTCUT ICONS --}}
	<link rel="icon" type="image/x-icon" href="./favicon.ico">

	<!-- Scripts & Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>