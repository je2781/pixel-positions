@props(['label', 'name', 'type' => 'text', 'hasIcon' => false])

@php
    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'class' => $hasIcon ? 'placeholder:text-white/10 flex-1 h-full focus:outline-none placeholder:text-sm bg-transparent text-white' : 'text-white rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => old($name),
        'autocomplete' => 'off'
    ];
@endphp

<x-forms.field :$label :$name>
    @if ($hasIcon)
        <div
            class="w-full flex flex-row items-center pl-5 pr-4 text-sm text-white/10 py-3 border border-white/10 rounded-2xl bg-white/5">
            <input {{ $attributes($defaults) }}>
            <span class="w-3 h-3 inline-block bg-white align-middle"></span>
        </div>
    @else
        <input {{ $attributes($defaults) }}>
    @endif
</x-forms.field>