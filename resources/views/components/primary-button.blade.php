<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] border border-transparent rounded-sm font-medium text-sm text-white dark:text-[#1b1b18] hover:opacity-90 dark:hover:opacity-80 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
