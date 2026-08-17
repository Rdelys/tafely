<section id="produits" class="py-16 sm:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Découvrez nos deux produits</h2>
            <p class="mt-3 text-gray-600 max-w-xl mx-auto">Une seule philosophie : ajoutez votre contenu, obtenez votre page à partager.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            @foreach($produits as $index => $produit)
                @php
                    $isBoutiq = $produit['couleur'] === 'blue';
                @endphp

                <div id="{{ $isBoutiq ? 'boutiq' : 'resto' }}"
                     data-aos="fade-{{ $isBoutiq ? 'right' : 'left' }}"
                     class="relative bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border-t-4 border-tafelyBlue hover:-translate-y-2">

                    <div class="bg-gradient-to-br from-tafelyBlue to-blue-800 p-8 text-white text-center">
                        <div class="w-20 h-20 mx-auto bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                            <i class="fa-solid {{ $produit['icone'] }} text-4xl {{ $isBoutiq ? 'text-white' : 'text-yellow-300' }}"></i>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold">{{ $produit['nom'] }}</h3>
                        <p class="mt-2 text-white/90">{{ $produit['slogan'] }}</p>
                    </div>

                    <div class="p-8">
                        <p class="text-gray-600 mb-6">{{ $produit['description'] }}</p>

                        <ul class="space-y-3 mb-8">
                            @foreach($produit['fonctionnalites'] as $fonctionnalite)
                                <li class="flex items-center gap-3 text-gray-700">
                                    <span class="w-6 h-6 flex items-center justify-center rounded-full bg-blue-100 text-tafelyBlue text-xs">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    {{ $fonctionnalite }}
                                </li>
                            @endforeach
                        </ul>

                        {{-- Prix mis en avant --}}
                        <div class="rounded-2xl bg-blue-50 p-6 text-center mb-6">
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Tarif</p>
                            <p class="text-4xl font-extrabold text-tafelyBlue">20 000 Ar<span class="text-lg font-semibold text-gray-500"> /mois</span></p>
                            <p class="text-gray-500 font-medium">soit environ 6 € / mois</p>
                        </div>

                        @if($produit['lien'])
                            <a href="{{ $produit['lien'] }}" target="_blank"
                               class="flex items-center justify-center gap-2 w-full bg-gradient-to-r from-tafelyBlue to-blue-800 text-white font-bold px-6 py-3.5 rounded-full hover:scale-105 transition transform">
                                <i class="fa-solid fa-arrow-right"></i> Découvrir {{ $produit['nom'] }}
                            </a>
                        @else
                            <div class="flex items-center justify-center gap-2 w-full bg-gray-200 text-gray-600 font-bold px-6 py-3.5 rounded-full">
                                <i class="fa-solid fa-clock"></i> Sortira prochainement
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>