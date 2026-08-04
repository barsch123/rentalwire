@props([
    'title' => config('app.name'),
    'description' => 'Solara designs dependable solar energy systems for homes and businesses across Jamaica.',
    'keywords' => 'Solara, solar energy, solar panels, battery storage, Jamaica',
    'canonicalUrl' => url()->current(),
    'image' => asset('img/logo.svg'),
    'robots' => 'index, follow',
])

<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ config('app.name') }}">
<meta name="robots" content="{{ $robots }}">
<meta name="googlebot" content="{{ $robots }}, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:image" content="{{ $image }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

<link rel="canonical" href="{{ $canonicalUrl }}">
