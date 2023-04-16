@props(['active' => false])

@php
    $classes = 'block text-sm font-semibold leading-8 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white rounded-xl';
    
    if ($active) {
        $classes .= ' bg-blue-500 text-white';
    }
@endphp

<a {{ $attributes(['class' => $classes]) }} {{ $attributes }}>{{ $slot }}</a>
