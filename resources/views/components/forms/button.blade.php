@props(['isText' => false])

@if ($isText)
    <a {{ $attributes(['class' => 'bg-transparent text-blue-800 border-0 font-bold']) }}>{{ $slot }}</a>
@else
    <button {{ $attributes(['class' => 'bg-blue-800 rounded py-2 px-6 font-bold']) }}>{{ $slot }}</button>
@endif