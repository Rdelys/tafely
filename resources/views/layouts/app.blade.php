<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafely.GR - Créez votre boutique ou votre carte de restaurant en ligne</title>
    <meta name="description" content="Tafely.GR propose Tafely Boutiq et Tafely Resto : deux solutions simples pour vendre en ligne en quelques clics.">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tafelyBlue: '#0a1f8f',
                        tafelyRed: '#e8262a',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delay': 'float 6s ease-in-out 2s infinite',
                        'gradient': 'gradient 8s ease infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
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
        .gradient-bg {
            background: linear-gradient(-45deg, #071454, #0a1f8f, #1e3fc4, #0a1f8f);
            background-size: 400% 400%;
            animation: gradient 10s ease infinite;
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
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>