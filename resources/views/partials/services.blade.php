<section id="services" class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="kicker text-tafelyRed justify-center">Nos services</span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mt-4 tracking-tight">
                Une équipe qui vous mène <span class="text-tafelyBlue">à bon port</span>
            </h2>
            <p class="mt-4 text-gray-500 max-w-xl mx-auto text-lg">
                De l'idée à la mise en ligne, nous concevons des solutions numériques fiables et modernes.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $services = [
                    ['icone' => 'fa-compass', 'titre' => 'Sites vitrines', 'desc' => 'Des sites élégants pour présenter votre activité.'],
                    ['icone' => 'fa-cart-shopping', 'titre' => 'E-commerce', 'desc' => 'Des boutiques en ligne prêtes à vendre.'],
                    ['icone' => 'fa-robot', 'titre' => 'Solutions IA', 'desc' => 'Des agents intelligents pour automatiser vos process.'],
                    ['icone' => 'fa-gears', 'titre' => 'Applications sur mesure', 'desc' => 'Des plateformes adaptées à vos besoins spécifiques.'],
                ];
            @endphp

            @foreach($services as $i => $s)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}"
                     class="group p-8 rounded-2xl border border-gray-100 hover:border-tafelyBlue/30 hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-16 h-16 mx-auto bg-tafelyBlue/10 text-tafelyBlue rounded-2xl flex items-center justify-center text-2xl mb-4 group-hover:bg-tafelyBlue group-hover:text-white transition">
                        <i class="fa-solid {{ $s['icone'] }}"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $s['titre'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $s['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>