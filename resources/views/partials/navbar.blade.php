<header class="w-full bg-white/95 backdrop-blur shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('logo.png') }}" alt="Tafely.GR" class="h-14 sm:h-16 w-auto">
        </a>

        {{-- Menu desktop --}}
        <nav class="hidden md:flex items-center gap-8 font-semibold text-gray-700">
            <a href="#accueil" class="hover:text-tafelyBlue transition">Accueil</a>
            <a href="#services" class="hover:text-tafelyBlue transition">Services</a>
            <a href="#portfolio" class="hover:text-tafelyBlue transition">Nos projets</a>

            {{-- Dropdown Produits desktop (hover) --}}
            <div class="relative group">
                <button class="flex items-center gap-1 hover:text-tafelyBlue transition">
                    Produits <i class="fa-solid fa-chevron-down text-xs mt-0.5"></i>
                </button>
                <div class="absolute left-1/2 -translate-x-1/2 top-full pt-4 w-72 opacity-0 invisible
                            group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 p-4 space-y-2">
                        @foreach($produits as $produit)
                            <a href="#produits" class="flex items-start gap-3 p-3 rounded-xl hover:bg-blue-50 transition">
                                <div class="w-10 h-10 flex items-center justify-center bg-tafelyBlue/10 text-tafelyBlue rounded-lg">
                                    <i class="fa-solid {{ $produit['icone'] }}"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">{{ $produit['nom'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $produit['slogan'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <a href="#contact" class="hover:text-tafelyBlue transition">Contact</a>
        </nav>

        <a href="#contact"
           class="hidden md:inline-flex items-center gap-2 bg-tafelyBlue text-white px-5 py-2.5 rounded-full font-semibold hover:bg-tafelyDeep hover:scale-105 transition transform">
            <i class="fa-solid fa-compass"></i> Démarrer un projet
        </a>

        <button id="menu-btn" class="md:hidden text-tafelyBlue text-2xl focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    {{-- Menu mobile --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t px-4 py-4 space-y-1">
        <a href="#accueil" class="block font-semibold py-2">Accueil</a>
        <a href="#services" class="block font-semibold py-2">Services</a>
        <a href="#portfolio" class="block font-semibold py-2">Nos projets</a>

        {{-- Accordéon Produits mobile --}}
        <div class="border-t border-gray-100 pt-2">
            <button id="produits-toggle" class="w-full flex items-center justify-between font-semibold py-2">
                Produits
                <i id="produits-icon" class="fa-solid fa-chevron-down text-xs transition-transform duration-300"></i>
            </button>
            <div id="produits-submenu" class="hidden pl-3 border-l-2 border-tafelyBlue/20 space-y-3 pb-2">
                @foreach($produits as $produit)
                    <a href="#produits" class="flex items-center gap-2 text-sm text-gray-600 py-1">
                        <i class="fa-solid {{ $produit['icone'] }} text-tafelyBlue"></i>
                        <div>
                            <p class="font-semibold text-gray-700">{{ $produit['nom'] }}</p>
                            <p class="text-xs text-gray-400">{{ $produit['slogan'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <a href="#contact" class="block font-semibold py-2 border-t border-gray-100 mt-2 pt-3">Contact</a>
        <a href="#contact" class="block bg-tafelyBlue text-white text-center px-5 py-2.5 rounded-full font-semibold mt-2">
            <i class="fa-solid fa-compass"></i> Démarrer un projet
        </a>
    </div>
</header>

<script>
    // Menu mobile principal
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

    // Accordéon Produits (mobile)
    const produitsToggle = document.getElementById('produits-toggle');
    const produitsSubmenu = document.getElementById('produits-submenu');
    const produitsIcon = document.getElementById('produits-icon');

    produitsToggle.addEventListener('click', () => {
        produitsSubmenu.classList.toggle('hidden');
        produitsIcon.classList.toggle('rotate-180');
    });
</script>