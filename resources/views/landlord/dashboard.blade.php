@extends('landlord.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Properties Count Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Properties</p>
                <p class="text-3xl font-bold text-gray-900">{{ $propertiesCount }}</p>
            </div>
            <div class="text-blue-600 text-4xl">🏠</div>
        </div>
    </div>

    <!-- Available Properties Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Available</p>
                <p class="text-3xl font-bold text-gray-900">{{ $availableProperties }}</p>
            </div>
            <div class="text-green-600 text-4xl">✓</div>
        </div>
    </div>

    <!-- Total Rent Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Monthly Rent</p>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($totalRent, 2) }}</p>
            </div>
            <div class="text-yellow-600 text-4xl">💰</div>
        </div>
    </div>

    <!-- Traders Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Available Traders</p>
                <p class="text-3xl font-bold text-gray-900">{{ $tradersCount }}</p>
            </div>
            <div class="text-purple-600 text-4xl">👷</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-4">Quick Actions</h3>
    <div class="flex gap-4">
        <a href="{{ route('landlord.properties.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Property
        </a>
        <a href="{{ route('landlord.properties.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
            View Properties
        </a>
        <a href="{{ route('landlord.traders.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
            View Traders
        </a>
    </div>
</div>
@endsection
