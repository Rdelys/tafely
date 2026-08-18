<section id="portfolio" class="py-16 sm:py-24 bg-gray-50 relative overflow-hidden">
    <div class="absolute top-10 right-10 text-tafelyBlue/5 text-9xl">
        <i class="fa-solid fa-map"></i>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-tafelyRed font-semibold uppercase tracking-wide text-sm">Nos réalisations</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2">Les projets déjà à quai</h2>
            <p class="mt-3 text-gray-600 max-w-xl mx-auto">Quelques-unes des solutions que nous avons conçues et lancées.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projets as $index => $projet)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                     class="group bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-300 hover:-translate-y-2 border border-gray-100">

                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset($projet['image']) }}" alt="{{ $projet['nom'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-tafelyDeep/70 to-transparent"></div>
                        <span class="absolute top-4 left-4 bg-tafelyBlue text-white text-xs font-bold px-3 py-1 rounded-full">
                            {{ $projet['categorie'] }}
                        </span>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $projet['nom'] }}</h3>
                        <p class="text-gray-500 text-sm mb-4">{{ $projet['description'] }}</p>

                        @if($projet['lien'])
                            <a href="{{ $projet['lien'] }}" target="_blank"
                               class="inline-flex items-center gap-2 text-tafelyBlue font-semibold hover:text-tafelyRed transition">
                                Voir le projet <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        @else
                            <span class="inline-flex items-center gap-2 text-gray-400 font-semibold text-sm">
                                <i class="fa-solid fa-lock"></i> Lien privé
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-400">D'autres projets arrivent bientôt.</p>
            @endforelse
        </div>
    </div>
</section>