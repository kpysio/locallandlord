<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1b1b18] dark:text-[#EDEDEC] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-[#1b1b18] dark:text-[#EDEDEC]">
                    <div class="text-center py-8">
                        <h3 class="text-2xl font-semibold mb-2">{{ __('Welcome to Dashboard') }}</h3>
                        <p class="text-[#706f6c] dark:text-[#A1A09A] mb-6">{{ __('You are successfully logged in!') }}</p>
                        <a href="{{ route('profile.edit') }}" class="inline-block px-6 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#1b1b18] rounded-sm font-medium hover:opacity-90 transition">
                            {{ __('Edit Profile') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
