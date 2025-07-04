@props(['employer', 'width' => 48])

@php
    $img_classes = "bg-center bg-cover h-full w-full block " ;
    $container_classes = "relative ";

    if($width > 48){
        $img_classes .= "rounded-lg";
        $container_classes .= "w-[4.5rem] h-[4.5rem]";
    }else{
        $img_classes .= "rounded-xl";
        $container_classes .= "w-12 h-12";
    }
@endphp

<div class="{{ $container_classes }}">
<img class="{{ $img_classes }}" alt="company-logo" src="{{ asset($employer->logo) }}" />
</div>