@extends('public.layout')

@section('title', 'Register as Landlord')
@section('page_title', 'Landlord Registration')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Intro -->
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-semibold text-gray-900">Create your landlord account</h1>
        <p class="mt-2 text-sm text-gray-600">Traders do not register online. To join as a trader, please contact us by phone.</p>

        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="e.g. Jane Doe" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-2 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-2 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="pt-2">
                <x-primary-button class="w-full justify-center">
                    {{ __('Register as Landlord') }}
                </x-primary-button>
            </div>

            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600 text-center">
                    {{ __('Already have an account?') }}
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">{{ __('Sign in') }}</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
