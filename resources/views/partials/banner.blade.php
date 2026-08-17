<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('hero.png') }}');">

    {{-- Overlay bleu léger pour lisibilité --}}
    <div class="absolute inset-0 bg-gradient-to-br from-tafelyBlue/75 via-blue-900/50 to-tafelyBlue/75"></div>

    {{-- Formes flottantes décoratives --}}
    <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full animate-float"></div>
    <div class="absolute bottom-10 right-10 w-48 h-48 bg-white/10 rounded-full animate-float-delay"></div>
    <div class="absolute top-1/2 left-1/3 w-20 h-20 bg-white/10 rounded-full animate-float"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32 text-center">
        <span data-aos="fade-down" class="inline-block bg-white/20 text-white text-sm font-semibold px-4 py-2 rounded-full mb-6">
            <i class="fa-solid fa-bolt text-tafelyRed"></i> Deux solutions, une seule marque
        </span>

        <h1 data-aos="fade-up" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
            Vendez en ligne <span class="text-yellow-300">en quelques clics</span>
        </h1>

        <p data-aos="fade-up" data-aos-delay="150" class="mt-6 text-lg sm:text-xl text-white/90 max-w-2xl mx-auto">
            <strong>Tafely.GR</strong> propose deux outils simples : <strong>Tafely Boutiq</strong> pour vendre vos produits,
            et <strong>Tafely Resto</strong> pour partager la carte de votre restaurant. Ajoutez, partagez, vendez.
        </p>

        <div data-aos="fade-up" data-aos-delay="300" class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#boutiq" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-white text-tafelyBlue font-bold px-8 py-3.5 rounded-full shadow-lg hover:scale-105 transition transform">
                <i class="fa-solid fa-store"></i> Tafely Boutiq
            </a>
            <a href="#resto" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-blue-800 text-white font-bold px-8 py-3.5 rounded-full shadow-lg hover:scale-105 hover:bg-blue-900 transition transform border-2 border-white/30">
                <i class="fa-solid fa-utensils"></i> Tafely Resto
            </a>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full">
        <svg viewBox="0 0 1440 100" class="w-full h-16 sm:h-24" preserveAspectRatio="none">
            <path fill="#f9fafb" d="M0,50 C360,100 1080,0 1440,50 L1440,100 L0,100 Z"></path>
        </svg>
    </div>
</section>