<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafely.GR - Agence de développement numérique</title>
    <meta name="description" content="Tafely.GR conçoit des sites web, plateformes et solutions numériques sur mesure pour votre entreprise.">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tafelyBlue: '#0a1f8f',
                        tafelyDeep: '#071454',
                        tafelyRed: '#e8262a',
                        tafelySand: '#f4c95d',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delay': 'float 6s ease-in-out 2s infinite',
                        'sway': 'sway 4s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-18px)' },
                        },
                        sway: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        },
                    },
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="icon" href="{{ asset('logo.png') }}">

    <style>
        .ocean-bg {
            background: linear-gradient(-45deg, #071454, #0a1f8f, #14309e, #0a1f8f);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
        }
        @keyframes gradientMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .wave-divider {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 60'%3E%3Cpath d='M0 30 Q 150 60 300 30 T 600 30 T 900 30 T 1200 30 V60H0Z' fill='%230a1f8f' fill-opacity='0.15'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            background-size: 1000px 60px;
        }
    </style>
</head>
<body class="antialiased text-gray-800 overflow-x-hidden">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>