<!-- Fixed button visibility with white text and better contrast -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-700 to-gray-800 border border-white/20 rounded-xl font-semibold text-sm text-white uppercase tracking-wider hover:from-gray-600 hover:to-gray-700 hover:border-white/30 focus:outline-none focus:ring-2 focus:ring-gray-400/50 focus:ring-offset-2 focus:ring-offset-gray-900 active:from-gray-800 active:to-gray-900 disabled:opacity-50 transition-all duration-300 shadow-lg backdrop-blur-sm']) }}>
    {{ $slot }}
</button>
