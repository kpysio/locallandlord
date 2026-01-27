<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use App\Models\TradeCategory;
use App\Models\TradeLocation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TraderProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:trader']);
    }

    public function edit(Request $request): View
    {
        $user = $request->user();
        $trader = $user->trader;

        $categories = TradeCategory::where('status', 'active')->orderBy('name')->get();
        $locations = TradeLocation::where('status', 'active')->orderBy('name')->get();

        return view('trader.profile', [
            'user' => $user,
            'trader' => $trader,
            'categories' => $categories,
            'locations' => $locations,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        $trader = $user->trader;

        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'plan' => ['required', 'in:silver,gold'],
            'trade_categories' => ['required', 'array', 'min:1'],
            'trade_categories.*' => ['exists:trade_categories,id'],
            'trade_locations' => ['required', 'array', 'min:1'],
            'trade_locations.*' => ['exists:trade_locations,id'],
        ]);

        // Update user
        $user->update([
            'name' => $validated['business_name'],
            'email' => $validated['email'],
        ]);

        // Update trader profile fields
        $trader->update([
            'business_name' => $validated['business_name'],
            'phone' => $validated['phone'],
            'plan' => $validated['plan'],
        ]);

        // Sync relationships
        $trader->tradeCategories()->sync($validated['trade_categories']);
        $trader->tradeLocations()->sync($validated['trade_locations']);

        return redirect()
            ->route('trader.profile.edit')
            ->with('status', 'Profile updated successfully.');
    }
}
