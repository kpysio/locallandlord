@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#F53003] text-start text-base font-medium text-[#F53003] dark:text-[#FF4433] bg-[#fff2f2] dark:bg-[#1D0002] focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f5f5f5] dark:hover:bg-[#262524] hover:border-[#e3e3e0] dark:hover:border-[#3E3E3A] focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
