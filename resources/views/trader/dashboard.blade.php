@extends('trader.layout')

@section('title', 'Trader Dashboard')
@section('page_title', 'Trader Dashboard')

@section('content')
{{-- Top stats cards (Tailwind Toolbox Admin-style) --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Business</p>
                <p class="mt-2 text-2xl font-bold text-gray-900">
                    {{ $businessName ?? 'Set up profile' }}
                </p>
            </div>
            <div class="text-3xl text-blue-500">
                🧱
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Services</p>
                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $tradeCategoriesCount }}
                </p>
            </div>
            <div class="text-3xl text-green-500">
                🛠️
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Locations</p>
                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $tradeLocationsCount }}
                </p>
            </div>
            <div class="text-3xl text-orange-500">
                📍
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Plan</p>
                <div class="mt-2">
                    @if ($plan)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                     {{ $plan === 'gold' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($plan) }} plan
                        </span>
                    @else
                        <span class="text-gray-400 text-sm">Not selected</span>
                    @endif
                </div>
            </div>
            <div class="text-3xl text-purple-500">
                ⭐
            </div>
        </div>
    </div>
</div>

{{-- Main panel --}}
<div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Next steps</h3>
    <div class="space-y-3 text-sm text-gray-700">
        <p>• Complete your <a href="{{ route('trader.profile.edit') }}" class="text-blue-600 hover:underline">business profile</a>.</p>
        <p>• Choose your <a href="{{ route('trader.trade-category') }}" class="text-blue-600 hover:underline">services</a> and <a href="{{ route('trader.trade-location') }}" class="text-blue-600 hover:underline">locations</a>.</p>
        <p>• Review <a href="{{ route('trader.jobs') }}" class="text-blue-600 hover:underline">jobs</a> raised by landlords.</p>
    </div>
</div>
@endsection