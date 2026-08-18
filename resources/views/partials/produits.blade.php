<section id="produits" class="py-16 sm:py-24 bg-white relative overflow-hidden">
    <div class="absolute -top-10 -left-10 text-tafelyBlue/5 text-9xl">
        <i class="fa-solid fa-compass"></i>
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            @foreach($produits as $index => $produit)
                @php
                    $isBlue = $produit['couleur'] === 'blue';
                    $bgGradient = $isBlue ? 'from-tafelyBlue to-tafelyDeep' : 'from-tafelyRed to-red-700';
                    $textColor = $isBlue ? 'text-tafelyBlue' : 'text-tafelyRed';
                    $borderColor = $isBlue ? 'border-tafelyBlue' : 'border-tafelyRed';
                    $badgeBg = $isBlue ? 'bg-blue-100' : 'bg-red-100';
                @endphp

                <div data-aos="fade-{{ $isBlue ? 'right' : 'left' }}"
                     class="group relative bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-tafelyBlue/30 hover:-translate-y-3">

                    <div class="bg-gradient-to-br {{ $bgGradient }} p-8 text-white text-center">
                        <div class="w-20 h-20 mx-auto bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                            <i class="fa-solid {{ $produit['icone'] }} text-4xl"></i>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold">{{ $produit['nom'] }}</h3>
                        <p class="mt-2 text-white/90">{{ $produit['slogan'] }}</p>
                    </div>

                    <div class="p-8">
                        <p class="text-gray-600 mb-6">{{ $produit['description'] }}</p>

                        <ul class="space-y-3 mb-8">
                            @foreach($produit['fonctionnalites'] as $fonctionnalite)
                                <li class="flex items-center gap-3 text-gray-700">
                                    <span class="w-6 h-6 flex items-center justify-center rounded-full {{ $badgeBg }} {{ $textColor }} text-xs">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    {{ $fonctionnalite }}
                                </li>
                            @endforeach
                        </ul>

                        @if($produit['lien'])
                            <a href="{{ $produit['lien'] }}" target="_blank"
                               class="flex items-center justify-center gap-2 w-full bg-gradient-to-r {{ $bgGradient }} text-white font-bold px-6 py-3.5 rounded-full hover:scale-105 transition transform">
                                <i class="fa-solid fa-arrow-right"></i> Découvrir {{ $produit['nom'] }}
                            </a>
                        @else
                            <div class="flex items-center justify-center gap-2 w-full bg-gray-200 text-gray-600 font-bold px-6 py-3.5 rounded-full">
                                <i class="fa-solid fa-clock"></i> Sortira prochainement
                            </div>
                        @endif
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-tafelyBlue via-tafelyElectric to-tafelyBlue scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>