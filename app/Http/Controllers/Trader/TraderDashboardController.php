<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TraderDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:trader']);
    }

    public function index(Request $request): View
    {
        $trader = auth()->user()->trader;

        $businessName = $trader ? $trader->business_name : null;
        $tradeCategoriesCount = $trader ? $trader->tradeCategories()->count() : 0;
        $tradeLocationsCount = $trader ? $trader->tradeLocations()->count() : 0;
        $plan = $trader ? $trader->plan : null;

        return view('trader.dashboard', compact(
            'businessName',
            'tradeCategoriesCount',
            'tradeLocationsCount',
            'plan'
        ));
    }
}
