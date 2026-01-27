<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1b1b18] dark:text-[#EDEDEC] leading-tight">
            {{ __('Trader Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden shadow-sm rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Trader Profile</h1>

    @if (session('status'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('trader.profile.update') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Trader Business Name</label>
            <input type="text" name="business_name" value="{{ old('business_name', $trader->business_name ?? $user->name) }}"
                   class="mt-1 block w-full rounded border-gray-300" required>
            @error('business_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Trader Trade Category</label>
            <select name="trade_categories[]" multiple
                    class="mt-1 block w-full rounded border-gray-300" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(in_array($category->id, old('trade_categories', $trader->tradeCategories->pluck('id')->all())))>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <p class="mt-1 text-xs text-gray-500">Hold Ctrl (Windows) or Cmd (Mac) to select multiple.</p>
            @error('trade_categories')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Trader Trade Location</label>
            <select name="trade_locations[]" multiple
                    class="mt-1 block w-full rounded border-gray-300" required>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}"
                        @selected(in_array($location->id, old('trade_locations', $trader->tradeLocations->pluck('id')->all())))>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
            <p class="mt-1 text-xs text-gray-500">Hold Ctrl (Windows) or Cmd (Mac) to select multiple.</p>
            @error('trade_locations')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Trader Phone No</label>
                <input type="text" name="phone" value="{{ old('phone', $trader->phone) }}"
                       class="mt-1 block w-full rounded border-gray-300" required>
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Trader Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="mt-1 block w-full rounded border-gray-300" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Trader Plan</label>
            <select name="plan" class="mt-1 block w-full rounded border-gray-300" required>
                <option value="">Select Plan</option>
                <option value="silver" @selected(old('plan', $trader->plan) === 'silver')>Silver</option>
                <option value="gold" @selected(old('plan', $trader->plan) === 'gold')>Gold</option>
            </select>
            @error('plan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                Save Profile
            </button>
        </div>
            </div>
        </div>
    </div>
</x-app-layout>
