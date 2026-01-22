@extends('landlord.layout')

@section('title', 'Traders')
@section('page_title', 'Available Traders')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Joined</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($traders as $trader)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-3 font-medium">{{ $trader->user->name }}</td>
                    <td class="px-6 py-3">{{ $trader->user->email }}</td>
                    <td class="px-6 py-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            {{ ucfirst($trader->approval_status) }}
                        </span>
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
