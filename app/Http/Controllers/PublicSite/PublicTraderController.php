<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use Illuminate\Http\Request;

class PublicTraderController extends Controller
{
    public function show(Trader $trader)
    {
        // Only show approved traders
        if (! $trader->isApproved()) {
            abort(404);
        }

        $trader->load(['user', 'tradeCategories', 'tradeLocations']);

        return view('public.traders.show', [
            'trader' => $trader,
        ]);
    }
}