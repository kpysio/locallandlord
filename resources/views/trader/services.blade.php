@extends('trader.layout')

@section('title', 'Trader Services')
@section('page_title', 'Services')

@section('content')
@php
    $trader = auth()->user()->trader;
@endphp

<div class="max-w-3xl mx-auto space-y-4">
    <h1 class="text-2xl font-semibold text-slate-50">Your services</h1>
    <p class="text-sm text-slate-400">
        Use the profile page to manage your services. This page will later show a friendlier selection UI.
    </p>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5">
        <h2 class="text-sm font-semibold text-slate-200 mb-2">Current trade categories</h2>
        <p class="text-slate-300 text-sm">
            {{ $trader->tradeCategories->pluck('name')->implode(', ') ?: 'No services selected yet.' }}
        </p>
        <a href="{{ route('trader.profile.edit') }}" class="inline-flex mt-3 text-xs text-cyan-300 underline">
            Update services in profile
        </a>
    </div>
</div>
@endsection

