<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">{{ __('Welcome Back') }}</h1>
        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Sign in to your account to continue') }}</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#F53003] shadow-sm focus:ring-[#F53003] dark:bg-[#1D1D1B]" name="remember">
            <label for="remember_me" class="ms-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-between pt-2">
            @if (Route::has('password.request'))
                <a class="text-sm text-[#F53003] hover:text-[#d42901] transition" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] text-center">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="text-[#F53003] hover:text-[#d42901] font-medium transition">{{ __('Register') }}</a>
            </p>
        </div>
    </form>
</x-guest-layout>
