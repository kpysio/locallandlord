@extends('landlord.layout')

@section('title', 'Traders')
@section('page_title', 'Available Traders')

@section('content')
<div class="mb-6 bg-white rounded-lg shadow p-4">
    <form method="GET" action="{{ route('landlord.traders.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Traders by Category</label>
            <select name="category_id" class="block w-full rounded border-gray-300">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($categoryId == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Select Location Area</label>
            <select name="location_id" class="block w-full rounded border-gray-300">
                <option value="">All Locations</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" @selected($locationId == $location->id)>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                Filter
            </button>
            <a href="{{ route('landlord.traders.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">
                Reset
            </a>
        </div>
    </form>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Categories</th>
                <th class="px-6 py-3 text-left">Locations</th>
                <th class="px-6 py-3 text-left">Plan</th>
                <th class="px-6 py-3 text-left">Joined</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($traders as $trader)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3 font-medium">{{ $trader->user->name }}</td>
                    <td class="px-6 py-3">{{ $trader->user->email }}</td>
                    <td class="px-6 py-3 text-xs text-gray-700">
                        {{ $trader->tradeCategories->pluck('name')->implode(', ') ?: '—' }}
                    </td>
                    <td class="px-6 py-3 text-xs text-gray-700">
                        {{ $trader->tradeLocations->pluck('name')->implode(', ') ?: '—' }}
                    </td>
                    <td class="px-6 py-3">
                        @if ($trader->plan)
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                {{ ucfirst($trader->plan) }}
                            </span>
                        @else
                            <span class="text-xs text-gray-400">Not set</span>
                        @endif
                    </td>
                    <td class="px-6 py-3 text-xs text-gray-500">
                        {{ $trader->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        <button class="text-blue-600 hover:underline">View Profile</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                        No approved traders available yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $traders->links() }}
</div>
@endsection
