@extends('landlord.layout')

@section('title', 'Properties')
@section('page_title', 'My Properties')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-semibold">Properties List</h3>
    <a href="{{ route('landlord.properties.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Add Property
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Address</th>
                <th class="px-6 py-3 text-left">Type</th>
                <th class="px-6 py-3 text-left">Rent</th>
                <th class="px-6 py-3 text-left">Beds/Baths</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3 font-medium">{{ $property->name }}</td>
                    <td class="px-6 py-3">{{ Str::limit($property->address, 30) }}</td>
                    <td class="px-6 py-3">{{ ucfirst($property->type) }}</td>
                    <td class="px-6 py-3">${{ $property->rent_amount ? number_format($property->rent_amount, 2) : '—' }}</td>
                    <td class="px-6 py-3">{{ $property->bedrooms ?? '—' }}/{{ $property->bathrooms ?? '—' }}</td>
                    <td class="px-6 py-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @if ($property->status === 'available')
                                bg-green-100 text-green-800
                            @elseif ($property->status === 'rented')
                                bg-blue-100 text-blue-800
                            @else
                                bg-yellow-100 text-yellow-800
                            @endif
                        ">
                            {{ ucfirst($property->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-3 text-center">
                        <a href="{{ route('landlord.properties.edit', $property) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('landlord.properties.destroy', $property) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $properties->links() }}
</div>
@endsection
