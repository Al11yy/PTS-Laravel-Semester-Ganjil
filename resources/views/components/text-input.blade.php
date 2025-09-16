@props(['disabled' => false])

<!-- Updated text input with glassy dark theme and better visibility -->
<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-black/20 backdrop-blur-sm border border-white/20 text-white placeholder-gray-400 focus:border-white/40 focus:ring-2 focus:ring-gray-400/50 focus:ring-offset-0 rounded-xl shadow-lg transition-all duration-300 px-4 py-3']) }}>
