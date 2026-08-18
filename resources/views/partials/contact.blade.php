<section id="contact" class="py-16 sm:py-24 ocean-bg relative overflow-hidden">
    <div class="absolute top-0 right-0 text-white/10 text-9xl animate-float">
        <i class="fa-solid fa-sailboat"></i>
    </div>

    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-3">Prêt à lancer votre projet ?</h2>
            <p class="text-white/90">Écrivez-nous à <strong>contact@tafely-gr.com</strong>, nous vous répondons rapidement.</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 font-semibold text-center px-6 py-4 rounded-xl mb-6" data-aos="fade-up">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" data-aos="fade-up" data-aos-delay="150"
              class="bg-white rounded-3xl shadow-2xl p-6 sm:p-10 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nom</label>
                <input type="text" name="nom" required value="{{ old('nom') }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-tafelyBlue">
                @error('nom') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-tafelyBlue">
                @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Message</label>
                <textarea name="message" rows="5" required
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-tafelyBlue">{{ old('message') }}</textarea>
                @error('message') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-tafelyBlue text-white font-bold px-6 py-4 rounded-full hover:bg-tafelyDeep hover:scale-[1.02] transition transform">
                <i class="fa-solid fa-paper-plane"></i> Envoyer le message
            </button>
        </form>
    </div>
</section>