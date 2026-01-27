<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use App\Models\TradeCategory;
use App\Models\TradeLocation;

class TraderListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:landlord']);
    }

    public function index()
    {
        $query = Trader::with(['user', 'tradeCategories', 'tradeLocations'])
            ->where('approval_status', 'approved');

        $categoryId = request('category_id');
        $locationId = request('location_id');

        if ($categoryId) {
            $query->whereHas('tradeCategories', function ($q) use ($categoryId) {
                $q->where('trade_categories.id', $categoryId);
            });
        }

        if ($locationId) {
            $query->whereHas('tradeLocations', function ($q) use ($locationId) {
                $q->where('trade_locations.id', $locationId);
            });
        }

        $traders = $query->paginate(10)->withQueryString();

        $categories = TradeCategory::where('status', 'active')->orderBy('name')->get();
        $locations = TradeLocation::where('status', 'active')->orderBy('name')->get();

        return view('landlord.traders.index', compact('traders', 'categories', 'locations', 'categoryId', 'locationId'));
    }
}
