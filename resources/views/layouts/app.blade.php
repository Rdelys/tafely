<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafely.GR - Agence de développement numérique</title>
    <meta name="description" content="Tafely.GR conçoit des sites web, plateformes et solutions numériques sur mesure pour votre entreprise.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Fonts premium --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Space Grotesk', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        tafelyBlue: '#0a1f8f',
                        tafelyDeep: '#050d3d',
                        tafelyElectric: '#2d5bff',
                        tafelyRed: '#e8262a',
                        tafelySand: '#f4c95d',
                        tafelyMist: '#94a3ff',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delay': 'float 6s ease-in-out 2s infinite',
                        'sway': 'sway 4s ease-in-out infinite',
                        'pulse-slow': 'pulseSlow 3s ease-in-out infinite',
                        'grid-move': 'gridMove 20s linear infinite',
                        'count-in': 'countIn 0.6s ease-out forwards',
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
                        pulseSlow: {
                            '0%, 100%': { opacity: 0.4, transform: 'scale(1)' },
                            '50%': { opacity: 0.8, transform: 'scale(1.05)' },
                        },
                        gridMove: {
                            '0%': { backgroundPosition: '0 0' },
                            '100%': { backgroundPosition: '60px 60px' },
                        },
                        countIn: {
                            '0%': { opacity: 0, transform: 'translateY(10px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        },
                    },
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="icon" href="{{ asset('bot.png') }}">

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-display { font-family: 'Space Grotesk', sans-serif; }

        /* Fond premium : mesh gradient + grille technique */
        .ocean-bg {
            position: relative;
            background:
                radial-gradient(circle at 20% 20%, rgba(45,91,255,0.35), transparent 45%),
                radial-gradient(circle at 80% 30%, rgba(232,38,42,0.15), transparent 40%),
                radial-gradient(circle at 50% 90%, rgba(45,91,255,0.25), transparent 45%),
                linear-gradient(160deg, #050d3d 0%, #0a1f8f 55%, #050d3d 100%);
        }
        .tech-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(148,163,255,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148,163,255,0.08) 1px, transparent 1px);
            background-size: 44px 44px;
            animation: gridMove 25s linear infinite;
            mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);
        }

        /* Kicker premium (petit label) */
        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }
        .kicker::before {
            content: '';
            width: 24px;
            height: 2px;
            background: currentColor;
            display: inline-block;
        }

        /* Cartes glass premium */
        .glass-card {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.12);
        }

        /* Bouton avec effet glow */
        .btn-glow {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .btn-glow::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, #2d5bff, #94a3ff, #2d5bff);
            border-radius: inherit;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
            filter: blur(8px);
        }
        .btn-glow:hover::before { opacity: 0.7; }
        .btn-glow:hover { transform: translateY(-2px); }

        /* Ligne radar animée (séparateur premium) */
        .radar-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, #2d5bff, transparent);
            position: relative;
            overflow: hidden;
        }
        .radar-line::after {
            content: '';
            position: absolute;
            top: 0; left: -30%;
            width: 30%; height: 100%;
            background: linear-gradient(90deg, transparent, #ffffff, transparent);
            animation: radarSweep 3s ease-in-out infinite;
        }
        @keyframes radarSweep {
            0% { left: -30%; }
            100% { left: 130%; }
        }

        .text-gradient {
            background: linear-gradient(90deg, #94a3ff, #ffffff 50%, #94a3ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="antialiased text-gray-800 overflow-x-hidden font-body">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, easing: 'ease-out-cubic' });
    </script>
        @include('partials.chatbot')
</body>
</html>