<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trader Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($traders->count())
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="border-b">
                                    <tr>
                                        <th class="text-left px-4 py-2">User</th>
                                        <th class="text-left px-4 py-2">Email</th>
                                        <th class="text-left px-4 py-2">Status</th>
                                        <th class="text-left px-4 py-2">Created</th>
                                        <th class="text-center px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($traders as $trader)
                                        <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="px-4 py-3">{{ $trader->user->name }}</td>
                                            <td class="px-4 py-3">{{ $trader->user->email }}</td>
                                            <td class="px-4 py-3">
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                    @if ($trader->approval_status === 'approved')
                                                        bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                    @elseif ($trader->approval_status === 'rejected')
                                                        bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                                    @else
                                                        bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                                    @endif
                                                ">
                                                    {{ ucfirst($trader->approval_status) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-xs text-gray-500">
                                                {{ $trader->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                @if ($trader->approval_status === 'pending')
                                                    <form action="{{ route('admin.traders.approve', $trader) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700">
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.traders.reject', $trader) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">
                                                            Reject
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-400 text-xs">—</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $traders->links() }}
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No traders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
