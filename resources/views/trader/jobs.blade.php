@extends('trader.layout')

@section('title', 'Trader Jobs')
@section('page_title', 'Jobs')

@section('content')
<div class="max-w-4xl mx-auto space-y-4">
    <h1 class="text-2xl font-semibold text-slate-50 mb-2">Jobs from landlords</h1>
    <p class="text-sm text-slate-400 mb-4">
        These are example jobs. Later this can be wired to real landlord requests.
    </p>

    <div class="space-y-3">
        @foreach ($jobs as $job)
            <div class="bg-slate-900 border border-slate-800 rounded-xl p-4 flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-semibold text-slate-100">{{ $job['title'] }}</h2>
                    <p class="text-xs text-slate-400 mt-1">
                        Area: {{ $job['area'] }} · Budget: {{ $job['budget'] }}
                    </p>
                </div>
                <span class="px-3 py-1 rounded-full text-[11px] font-semibold
                             {{ $job['status'] === 'New' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-500/40' :
                                ($job['status'] === 'Shortlisted' ? 'bg-amber-500/10 text-amber-300 border border-amber-500/40' :
                                 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/40') }}">
                    {{ $job['status'] }}
                </span>
            </div>
        @endforeach
    </div>
</div>
@endsection

