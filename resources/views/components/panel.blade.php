@php
    $classes = 'bg-white/10 rounded-xl group hover:border-blue-800 border border-transparent transition-all linear duration-100';
@endphp

<div
    {{ $attributes(['class' => $classes]) }}>
{{ $slot }}
</div>