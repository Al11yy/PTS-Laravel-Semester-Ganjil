@props(['value'])

<!-- Updated label with white text for better visibility in dark theme -->
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white mb-2']) }}>
    {{ $value ?? $slot }}
</label>
