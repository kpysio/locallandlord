@extends('trader.layout')

@section('title', 'Trader Profile')
@section('page_title', 'Trader Profile')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
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

            <!-- Services (Trade Categories) selection -->
            <div x-data='{
                    categoriesList: @json($categories->map(fn($c) => ["id" => $c->id, "name" => $c->name])->toArray()),
                    selectedCategoryId: "",
                    selectedCategories: @json(old("trade_categories", $trader->tradeCategories->pluck("id")->all())),
                    addCategory() {
                        const id = Number(this.selectedCategoryId);
                        if (!id) return;
                        if (!this.selectedCategories.includes(id)) {
                            this.selectedCategories.push(id);
                        }
                        this.selectedCategoryId = "";
                    },
                    removeCategory(id) {
                        this.selectedCategories = this.selectedCategories.filter(i => i !== id);
                    },
                    categoryName(id) {
                        const f = this.categoriesList.find(c => c.id === id);
                        return f ? f.name : id;
                    }
                }' class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Services</label>
                <div class="flex gap-2 items-center">
                    <select x-model="selectedCategoryId" class="mt-1 block w-full rounded border-gray-300">
                        <option value="">Select a service</option>
                        <template x-for="c in categoriesList" :key="c.id">
                            <option :value="c.id" x-text="c.name"></option>
                        </template>
                    </select>
                    <button type="button" @click="addCategory()"
                            class="inline-flex items-center px-3 py-2 bg-indigo-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                        Add
                    </button>
                </div>
                <div class="mt-2 flex flex-wrap gap-2">
                    <template x-for="id in selectedCategories" :key="id">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs">
                            <span x-text="categoryName(id)"></span>
                            <button type="button" @click="removeCategory(id)" class="text-blue-700 hover:text-blue-900">✕</button>
                        </span>
                    </template>
                </div>
                <!-- Hidden inputs for submission -->
                <template x-for="id in selectedCategories" :key="'cat-input-' + id">
                    <input type="hidden" name="trade_categories[]" :value="id">
                </template>
                @error('trade_categories')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Locations (Cities) selection -->
            <div x-data='{
                    locationsList: @json($locations->map(fn($l) => ["id" => $l->id, "name" => $l->name])->toArray()),
                    selectedLocationId: "",
                    selectedLocations: @json(old("trade_locations", $trader->tradeLocations->pluck("id")->all())),
                    addLocation() {
                        const id = Number(this.selectedLocationId);
                        if (!id) return;
                        if (!this.selectedLocations.includes(id)) {
                            this.selectedLocations.push(id);
                        }
                        this.selectedLocationId = "";
                    },
                    removeLocation(id) {
                        this.selectedLocations = this.selectedLocations.filter(i => i !== id);
                    },
                    locationName(id) {
                        const f = this.locationsList.find(l => l.id === id);
                        return f ? f.name : id;
                    }
                }' class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Cities</label>
                <div class="flex gap-2 items-center">
                    <select x-model="selectedLocationId" class="mt-1 block w-full rounded border-gray-300">
                        <option value="">Select a city</option>
                        <template x-for="l in locationsList" :key="l.id">
                            <option :value="l.id" x-text="l.name"></option>
                        </template>
                    </select>
                    <button type="button" @click="addLocation()"
                            class="inline-flex items-center px-3 py-2 bg-indigo-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                        Add
                    </button>
                </div>
                <div class="mt-2 flex flex-wrap gap-2">
                    <template x-for="id in selectedLocations" :key="id">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs">
                            <span x-text="locationName(id)"></span>
                            <button type="button" @click="removeLocation(id)" class="text-green-700 hover:text-green-900">✕</button>
                        </span>
                    </template>
                </div>
                <!-- Hidden inputs for submission -->
                <template x-for="id in selectedLocations" :key="'loc-input-' + id">
                    <input type="hidden" name="trade_locations[]" :value="id">
                </template>
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
        </form>
    </div>
</div>
@endsection
