@props(['tag' => null, 'size' => 'base'])

@php
    $classes = "bg-white/10 font-bold rounded-xl hover:bg-white/25 transition-colors ease-in-out duration-100";

    if ($size === 'small') {
        $classes .= " px-3 py-[5px] text-2xs";
    }
    if ($size === 'base') {
        $classes .= " px-5 py-[5px] text-sm";
    }


@endphp

@php
    $tag_href = $tag ? '/tags/' . $tag->id : '#';
    
@endphp

<a href="{{ $tag_href }}" class="{{ $classes }}">{{ $slot }}</a>