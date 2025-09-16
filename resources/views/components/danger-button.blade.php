<!-- Updated danger button with glassy dark theme and better contrast -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 border border-red-500/30 rounded-xl font-semibold text-sm text-white uppercase tracking-wider hover:from-red-500 hover:to-red-600 hover:border-red-400/40 active:from-red-700 active:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:opacity-50 transition-all duration-300 shadow-lg backdrop-blur-sm']) }}>
    {{ $slot }}
</button>
