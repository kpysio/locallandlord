<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 px-4">
            <a href="/" class="mb-8 hover:opacity-80 transition-opacity">
                <x-application-logo class="w-12 h-12 fill-current text-[#1b1b18] dark:text-[#EDEDEC]" />
            </a>

            <div class="w-full max-w-[440px] px-6 py-8 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg shadow-sm">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
