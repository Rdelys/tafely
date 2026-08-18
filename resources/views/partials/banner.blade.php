<section id="accueil" class="relative overflow-hidden ocean-bg">
    <div class="tech-grid"></div>

    {{-- Image hero en overlay léger, optionnelle --}}
    <div class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-overlay"
         style="background-image: url('{{ asset('hero.png') }}');"></div>

    <div class="absolute top-16 left-10 text-tafelyMist/20 text-6xl animate-float">
        <i class="fa-solid fa-compass"></i>
    </div>
    <div class="absolute bottom-24 right-14 text-tafelyMist/20 text-7xl animate-float-delay">
        <i class="fa-solid fa-anchor"></i>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 sm:py-36 text-center">
        <span data-aos="fade-down" class="kicker glass-card text-tafelyMist px-4 py-2 rounded-full mb-8">
            <i class="fa-solid fa-anchor text-tafelyRed"></i> Agence de développement numérique
        </span>

        <h1 data-aos="fade-up" class="font-display text-4xl sm:text-6xl lg:text-7xl font-bold text-white leading-[1.1] tracking-tight">
            Tafely.GR, votre <br class="hidden sm:block">
            <span class="text-gradient">cap vers le digital</span>
        </h1>

        <p data-aos="fade-up" data-aos-delay="150" class="mt-8 text-lg sm:text-xl text-white/70 max-w-2xl mx-auto leading-relaxed">
            Sites web, plateformes et solutions numériques sur mesure. Une approche technique
            rigoureuse, un design qui marque les esprits.
        </p>

        <div data-aos="fade-up" data-aos-delay="300" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#portfolio" class="btn-glow w-full sm:w-auto flex items-center justify-center gap-2 bg-white text-tafelyDeep font-bold px-8 py-4 rounded-full shadow-xl transition transform">
                <i class="fa-solid fa-map"></i> Voir nos projets
            </a>
            <a href="#contact" class="w-full sm:w-auto flex items-center justify-center gap-2 glass-card text-white font-bold px-8 py-4 rounded-full hover:bg-white/10 transition transform">
                <i class="fa-solid fa-paper-plane"></i> Démarrer un projet
            </a>
        </div>
                <button onclick="openTafelyBot()" data-aos="fade-up" data-aos-delay="380"
                class="mt-6 inline-flex items-center gap-2 text-white/80 hover:text-white text-sm font-semibold underline underline-offset-4 transition">
            <i class="fa-solid fa-comments"></i> Discutez avec notre bot pour obtenir un devis et un prix immédiat
        </button>

        {{-- Stats premium --}}
        <div data-aos="fade-up" data-aos-delay="450" class="mt-16 grid grid-cols-3 gap-4 sm:gap-8 max-w-2xl mx-auto">
            @php
                $stats = [
                    ['chiffre' => '2+', 'label' => 'Produits en cours'],
                    ['chiffre' => '100%', 'label' => 'Sur mesure'],
                    ['chiffre' => '6', 'label' => 'Mois offerts'],
                ];
            @endphp
            @foreach($stats as $stat)
                <div class="glass-card rounded-2xl py-5 px-2">
                    <p class="font-display text-2xl sm:text-3xl font-bold text-white">{{ $stat['chiffre'] }}</p>
                    <p class="text-xs sm:text-sm text-white/60 mt-1">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="radar-line"></div>

    <div class="relative">
        <svg viewBox="0 0 1440 100" class="w-full h-14 sm:h-20" preserveAspectRatio="none">
            <path fill="#f9fafb" d="M0,50 C360,100 1080,0 1440,50 L1440,100 L0,100 Z"></path>
        </svg>
    </div>
</section>