@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#1D1D1B] dark:text-[#EDEDEC] focus:border-[#F53003] focus:ring-[#F53003] rounded-sm shadow-sm']) }}>
