<header class="w-full bg-white/95 backdrop-blur shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('logo.png') }}" alt="Tafely.GR" class="h-14 sm:h-16 w-auto">
        </a>

        <nav class="hidden md:flex items-center gap-8 font-semibold text-gray-700">
            <a href="#produits" class="hover:text-tafelyBlue transition">Nos produits</a>
            <a href="#boutiq" class="hover:text-tafelyBlue transition">Tafely Boutiq</a>
            <a href="#resto" class="hover:text-tafelyBlue transition">Tafely Resto</a>
            <a href="#contact" class="hover:text-tafelyBlue transition">Contact</a>
        </nav>

        <a href="#contact"
           class="hidden md:inline-flex items-center gap-2 bg-tafelyBlue text-white px-5 py-2.5 rounded-full font-semibold hover:bg-blue-900 hover:scale-105 transition transform">
            <i class="fa-solid fa-paper-plane"></i> Nous contacter
        </a>

        <button id="menu-btn" class="md:hidden text-tafelyBlue text-2xl focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t px-4 py-4 space-y-3">
        <a href="#produits" class="block font-semibold">Nos produits</a>
        <a href="#boutiq" class="block font-semibold">Tafely Boutiq</a>
        <a href="#resto" class="block font-semibold">Tafely Resto</a>
        <a href="#contact" class="block font-semibold">Contact</a>
        <a href="#contact" class="block bg-tafelyBlue text-white text-center px-5 py-2.5 rounded-full font-semibold">
            <i class="fa-solid fa-paper-plane"></i> Nous contacter
        </a>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
</script>