<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">{{ __('Create Account') }}</h1>
        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Join us and start exploring') }}</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end pt-2">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] text-center">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="text-[#F53003] hover:text-[#d42901] font-medium transition">{{ __('Sign in') }}</a>
            </p>
        </div>
    </form>
</x-guest-layout>
