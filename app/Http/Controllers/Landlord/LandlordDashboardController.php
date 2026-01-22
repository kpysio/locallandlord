<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Trader;

class LandlordDashboardController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth', 'role:landlord']);
    }

    public function index()
    {
        $landlord = auth()->user()->landlord;

        $propertiesCount = $landlord->properties()->count();
        $tradersCount = Trader::count();
        $totalRent = $landlord->properties()->sum('rent_amount');
        $availableProperties = $landlord->properties()->where('status', 'available')->count();

        return view('landlord.dashboard', compact(
            'propertiesCount',
            'tradersCount',
            'totalRent',
            'availableProperties'
        ));
    }
}
