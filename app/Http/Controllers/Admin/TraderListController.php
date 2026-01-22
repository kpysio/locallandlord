<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trader;

class TraderListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $traders = Trader::with('user')
            ->orderBy('approval_status')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.traders.index', compact('traders'));
    }
}
