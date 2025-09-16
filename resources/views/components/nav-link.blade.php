@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 border-b-2 border-gray-300 text-sm font-medium leading-5 text-white bg-white/10 rounded-t-lg focus:outline-none focus:border-white transition duration-300 ease-in-out'
            : 'inline-flex items-center px-4 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-300 hover:text-white hover:border-white/30 hover:bg-white/5 rounded-t-lg focus:outline-none focus:text-white focus:border-white/30 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
