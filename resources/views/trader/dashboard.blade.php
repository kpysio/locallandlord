@extends('trader.layout')

@section('title', 'Trader Dashboard')
@section('page_title', 'Trader Dashboard')

@section('content')
@php
    $trader = auth()->user()->trader;
@endphp

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5">
        <p class="text-xs uppercase tracking-wide text-slate-400 mb-1">Business</p>
        <p class="text-2xl font-semibold text-slate-50">
            {{ $trader->business_name ?? 'Set up profile' }}
        </p>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5">
        <p class="text-xs uppercase tracking-wide text-slate-400 mb-1">Services</p>
        <p class="text-3xl font-bold text-cyan-400">
            {{ $trader->tradeCategories()->count() }}
        </p>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5">
        <p class="text-xs uppercase tracking-wide text-slate-400 mb-1">Locations</p>
        <p class="text-3xl font-bold text-fuchsia-400">
            {{ $trader->tradeLocations()->count() }}
        </p>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5">
        <p class="text-xs uppercase tracking-wide text-slate-400 mb-1">Plan</p>
        @if ($trader->plan)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                         {{ $trader->plan === 'gold' ? 'bg-amber-400/10 text-amber-300 border border-amber-400/40' : 'bg-cyan-400/10 text-cyan-300 border border-cyan-400/40' }}">
                {{ ucfirst($trader->plan) }} plan
            </span>
        @else
            <span class="text-slate-400 text-sm">Not selected</span>
        @endif
    </div>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-xl p-6">
    <h3 class="text-lg font-semibold text-slate-50 mb-4">Next steps</h3>
    <div class="space-y-3 text-sm text-slate-300">
        <p>• Complete your <a href="{{ route('trader.profile.edit') }}" class="text-cyan-300 underline">business profile</a>.</p>
        <p>• Choose your <a href="{{ route('trader.trade-category') }}" class="text-cyan-300 underline">services</a> and <a href="{{ route('trader.trade-location') }}" class="text-cyan-300 underline">locations</a>.</p>
        <p>• Review <a href="{{ route('trader.jobs') }}" class="text-cyan-300 underline">jobs</a> raised by landlords.</p>
    </div>
</div>
@endsection

