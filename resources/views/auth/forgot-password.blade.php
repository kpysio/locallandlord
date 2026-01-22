<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">{{ __('Reset Password') }}</h1>
        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Enter your email address and we\'ll send you a link to reset your password.') }}</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end pt-2">
            <x-primary-button>
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>

        <div class="pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] text-center">
                <a href="{{ route('login') }}" class="text-[#F53003] hover:text-[#d42901] font-medium transition">{{ __('Back to login') }}</a>
            </p>
        </div>
    </form>
</x-guest-layout>
