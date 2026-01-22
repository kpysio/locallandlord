@extends('landlord.layout')

@section('title', 'Add Property')
@section('page_title', 'Add New Property')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <form action="{{ route('landlord.properties.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Property Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full border border-gray-300 rounded p-2 @error('name') border-red-500 @enderror">
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" required class="mt-1 block w-full border border-gray-300 rounded p-2 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
            @error('address') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Type</label>
                <select name="type" required class="mt-1 block w-full border border-gray-300 rounded p-2 @error('type') border-red-500 @enderror">
                    <option value="">Select type</option>
                    <option value="residential" {{ old('type') === 'residential' ? 'selected' : '' }}>Residential</option>
                    <option value="commercial" {{ old('type') === 'commercial' ? 'selected' : '' }}>Commercial</option>
                    <option value="mixed" {{ old('type') === 'mixed' ? 'selected' : '' }}>Mixed</option>
                </select>
                @error('type') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Monthly Rent</label>
                <input type="number" name="rent_amount" step="0.01" value="{{ old('rent_amount') }}" class="mt-1 block w-full border border-gray-300 rounded p-2 @error('rent_amount') border-red-500 @enderror">
                @error('rent_amount') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Bedrooms</label>
                <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" class="mt-1 block w-full border border-gray-300 rounded p-2 @error('bedrooms') border-red-500 @enderror">
                @error('bedrooms') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bathrooms</label>
                <input type="number" name="bathrooms" value="{{ old('bathrooms') }}" class="mt-1 block w-full border border-gray-300 rounded p-2 @error('bathrooms') border-red-500 @enderror">
                @error('bathrooms') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded p-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" required class="mt-1 block w-full border border-gray-300 rounded p-2 @error('status') border-red-500 @enderror">
                <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>Available</option>
                <option value="rented" {{ old('status') === 'rented' ? 'selected' : '' }}>Rented</option>
                <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
            @error('status') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Create Property
            </button>
            <a href="{{ route('landlord.properties.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
