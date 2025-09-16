<!-- Updated secondary button with glassy dark theme and white text for better visibility -->
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/30 rounded-xl font-semibold text-sm text-white uppercase tracking-wider hover:bg-white/20 hover:border-white/40 focus:outline-none focus:ring-2 focus:ring-gray-400/50 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:opacity-50 transition-all duration-300 shadow-lg']) }}>
    {{ $slot }}
</button>
