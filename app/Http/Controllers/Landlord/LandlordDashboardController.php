<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use App\Models\Landlord;

class LandlordDashboardController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth', 'role:landlord']);
    }

    public function index()
    {
        $user = auth()->user();
        $landlord = $user->landlord;

        // Ensure landlord profile exists for landlord users
        if (!$landlord && $user->user_type === 'landlord') {
            $landlord = Landlord::firstOrCreate(['user_id' => $user->id]);
        }

        $propertiesCount = $landlord ? $landlord->properties()->count() : 0;
        $tradersCount = Trader::count();
        $totalRent = $landlord ? $landlord->properties()->sum('rent_amount') : 0;
        $availableProperties = $landlord ? $landlord->properties()->where('status', 'available')->count() : 0;

        return view('landlord.dashboard', compact(
            'propertiesCount',
            'tradersCount',
            'totalRent',
            'availableProperties'
        ));
    }
}
