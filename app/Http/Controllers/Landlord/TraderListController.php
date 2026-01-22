<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Trader;

class TraderListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:landlord']);
    }

    public function index()
    {
        $traders = Trader::with('user')
            ->where('approval_status', 'approved')
            ->paginate(10);

        return view('landlord.traders.index', compact('traders'));
    }
}
