<section id="portfolio" class="py-16 sm:py-24 bg-gray-50 relative overflow-hidden">
    <div class="absolute top-10 right-10 text-tafelyBlue/5 text-9xl">
        <i class="fa-solid fa-map"></i>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="kicker text-tafelyRed justify-center">Nos services</span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mt-4 tracking-tight">
                Une équipe qui vous mène <span class="text-tafelyBlue">à bon port</span>
            </h2>
            <p class="mt-4 text-gray-500 max-w-xl mx-auto text-lg">
                De l'idée à la mise en ligne, nous concevons des solutions numériques fiables et modernes.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projets as $index => $projet)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                     class="group relative bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-tafelyBlue/30 hover:-translate-y-3">

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
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-tafelyBlue via-tafelyElectric to-tafelyBlue scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-400">D'autres projets arrivent bientôt.</p>
            @endforelse
        </div>
    </div>
</section>