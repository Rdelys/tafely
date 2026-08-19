<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tafely.GR - Agence de développement numérique')</title>
    <meta name="description" content="@yield('description', 'Tafely.GR conçoit des sites web, plateformes et solutions numériques sur mesure pour votre entreprise à Madagascar.')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Tafely.GR - Agence de développement numérique')">
    <meta property="og:description" content="@yield('description', 'Sites web, plateformes et solutions numériques sur mesure.')">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="Tafely.GR">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Tafely.GR')">
    <meta name="twitter:description" content="@yield('description', 'Sites web, plateformes et solutions numériques sur mesure.')">
    <meta name="twitter:image" content="{{ asset('logo.png') }}">

    {{-- Schema.org : identifie l'agence auprès de Google --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Tafely.GR",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('logo.png') }}",
        "email": "contact@tafely-gr.com",
        "description": "Agence de développement numérique : sites web, plateformes et solutions sur mesure."
    }
    </script>

    {{-- Fonts premium --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind compilé --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="icon" href="{{ asset('bot.png') }}">
</head>
<body class="antialiased text-gray-800 overflow-x-hidden font-body">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.chatbot')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, easing: 'ease-out-cubic' });
    </script>
</body>
</html>