@extends('trader.layout')

@section('title', 'Trader Locations')
@section('page_title', 'Locations')

@section('content')
@php
    $trader = auth()->user()->trader;
@endphp

<div class="max-w-3xl mx-auto space-y-4">
    <h1 class="text-2xl font-semibold text-slate-50">Service areas</h1>
    <p class="text-sm text-slate-400">
        Use the profile page to manage your locations. This page will later show a map-style or tag-style selector.
    </p>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-5">
        <h2 class="text-sm font-semibold text-slate-200 mb-2">Current locations</h2>
        <p class="text-slate-300 text-sm">
            {{ $trader->tradeLocations->pluck('name')->implode(', ') ?: 'No locations selected yet.' }}
        </p>
        <a href="{{ route('trader.profile.edit') }}" class="inline-flex mt-3 text-xs text-cyan-300 underline">
            Update locations in profile
        </a>
    </div>
</div>
@endsection

