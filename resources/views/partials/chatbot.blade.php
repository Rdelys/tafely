<style>
    #chatbot-panel {
        transform: translateY(20px) scale(0.97);
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    #chatbot-panel.open {
        transform: translateY(0) scale(1);
        opacity: 1;
        pointer-events: auto;
    }
    #chatbot-toggle-btn {
        animation: pulseSlow 2.5s ease-in-out infinite;
    }
    .bot-bubble {
        animation: countIn 0.3s ease-out forwards;
    }
    .typing-dot {
        animation: bounce 1.2s infinite;
    }
    .typing-dot:nth-child(2) { animation-delay: 0.15s; }
    .typing-dot:nth-child(3) { animation-delay: 0.3s; }
    @keyframes bounce {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
        30% { transform: translateY(-4px); opacity: 1; }
    }
    #chatbot-messages::-webkit-scrollbar { width: 6px; }
    #chatbot-messages::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 999px; }
</style>

{{-- Bouton flottant --}}
<button id="chatbot-toggle-btn"
        class="fixed bottom-6 right-6 z-50 w-16 h-16 rounded-full bg-gradient-to-br from-tafelyBlue to-tafelyElectric shadow-2xl shadow-tafelyBlue/40 flex items-center justify-center hover:scale-110 transition-transform">
    <img src="{{ asset('bot.png') }}" alt="Assistant Tafely.GR" class="w-10 h-10 rounded-full object-cover">
</button>

{{-- Fenêtre de chat --}}
<div id="chatbot-panel"
     class="fixed bottom-24 right-6 z-50 w-[92vw] max-w-sm sm:w-96 h-[70vh] max-h-[560px] rounded-3xl shadow-2xl overflow-hidden flex flex-col bg-white border border-gray-100">

    {{-- Header --}}
    <div class="bg-gradient-to-br from-tafelyDeep to-tafelyBlue px-5 py-4 flex items-center gap-3 relative overflow-hidden">
        <div class="absolute -top-6 -right-6 text-white/10 text-7xl"><i class="fa-solid fa-compass"></i></div>
        <img src="{{ asset('bot.png') }}" alt="Bot" class="w-11 h-11 rounded-full object-cover ring-2 ring-white/30 relative">
        <div class="relative">
            <p class="text-white font-display font-bold leading-tight">Assistant Tafely.GR</p>
            <p class="text-white/70 text-xs flex items-center gap-1">
                <span class="w-2 h-2 bg-green-400 rounded-full inline-block"></span> En ligne — devis instantané
            </p>
        </div>
        <button id="chatbot-close-btn" class="ml-auto text-white/70 hover:text-white text-xl relative">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    {{-- Messages --}}
    <div id="chatbot-messages" class="flex-1 overflow-y-auto px-4 py-4 space-y-3 bg-gray-50">
        <div class="bot-bubble flex items-end gap-2">
            <img src="{{ asset('bot.png') }}" class="w-7 h-7 rounded-full flex-shrink-0">
            <div class="bg-white border border-gray-100 rounded-2xl rounded-bl-sm px-4 py-3 text-sm text-gray-700 shadow-sm max-w-[80%]">
                Bonjour 👋 Je suis l'assistant Tafely.GR. Que pourrions-nous faire pour vous aujourd'hui ?
            </div>
        </div>
    </div>

    {{-- Zone de saisie --}}
    <form id="chatbot-form" class="border-t border-gray-100 p-3 flex items-center gap-2 bg-white">
        <input id="chatbot-input" type="text" autocomplete="off" placeholder="Décrivez votre projet..."
               class="flex-1 bg-gray-100 rounded-full px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-tafelyBlue">
        <button type="submit" class="w-10 h-10 flex-shrink-0 bg-tafelyBlue text-white rounded-full flex items-center justify-center hover:bg-tafelyDeep transition">
            <i class="fa-solid fa-paper-plane text-sm"></i>
        </button>
    </form>
</div>

<script>
(function () {
    const toggleBtn = document.getElementById('chatbot-toggle-btn');
    const closeBtn = document.getElementById('chatbot-close-btn');
    const panel = document.getElementById('chatbot-panel');
    const form = document.getElementById('chatbot-form');
    const input = document.getElementById('chatbot-input');
    const messagesEl = document.getElementById('chatbot-messages');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    let history = [
        { role: 'assistant', content: "Bonjour, je suis l'assistant Tafely.GR. Que pourrions-nous faire pour vous aujourd'hui ?" }
    ];

    function openPanel() { panel.classList.add('open'); input.focus(); }
    function closePanel() { panel.classList.remove('open'); }

    toggleBtn.addEventListener('click', () => {
        panel.classList.contains('open') ? closePanel() : openPanel();
    });
    closeBtn.addEventListener('click', closePanel);

    // Exposé globalement pour être ouvert depuis n'importe quel bouton du site
    window.openTafelyBot = openPanel;

    function addMessage(role, text) {
        const wrapper = document.createElement('div');
        wrapper.className = 'bot-bubble flex items-end gap-2 ' + (role === 'user' ? 'justify-end' : '');

        if (role === 'assistant') {
            wrapper.innerHTML = `
                <img src="{{ asset('bot.png') }}" class="w-7 h-7 rounded-full flex-shrink-0">
                <div class="bg-white border border-gray-100 rounded-2xl rounded-bl-sm px-4 py-3 text-sm text-gray-700 shadow-sm max-w-[80%]"></div>
            `;
            wrapper.querySelector('div').textContent = text;
        } else {
            wrapper.innerHTML = `
                <div class="bg-tafelyBlue text-white rounded-2xl rounded-br-sm px-4 py-3 text-sm shadow-sm max-w-[80%]"></div>
            `;
            wrapper.querySelector('div').textContent = text;
        }

        messagesEl.appendChild(wrapper);
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    function showTyping() {
        const t = document.createElement('div');
        t.id = 'typing-indicator';
        t.className = 'bot-bubble flex items-end gap-2';
        t.innerHTML = `
            <img src="{{ asset('bot.png') }}" class="w-7 h-7 rounded-full flex-shrink-0">
            <div class="bg-white border border-gray-100 rounded-2xl rounded-bl-sm px-4 py-3 flex gap-1 shadow-sm">
                <span class="typing-dot w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                <span class="typing-dot w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                <span class="typing-dot w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
            </div>
        `;
        messagesEl.appendChild(t);
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }
    function removeTyping() {
        document.getElementById('typing-indicator')?.remove();
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;

        addMessage('user', text);
        history.push({ role: 'user', content: text });
        input.value = '';
        showTyping();

        try {
            const res = await fetch("{{ route('bot.chat') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ messages: history }),
            });

            const data = await res.json();
            removeTyping();

            const reply = data.reply || "Désolé, une erreur est survenue. Contactez-nous à contact@tafely-gr.com.";
            addMessage('assistant', reply);
            history.push({ role: 'assistant', content: reply });
        } catch (err) {
            removeTyping();
            addMessage('assistant', "Une erreur est survenue. Contactez-nous directement à contact@tafely-gr.com.");
        }
    });
})();
</script>