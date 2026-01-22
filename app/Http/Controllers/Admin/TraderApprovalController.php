<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use Illuminate\Http\RedirectResponse;

class TraderApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function approve(Trader $trader): RedirectResponse
    {
        $this->authorize('trader.approve');

        $trader->update(['approval_status' => 'approved']);

        return back()->with('status', 'Trader approved.');
    }

    public function reject(Trader $trader): RedirectResponse
    {
        $this->authorize('trader.reject');

        $trader->update(['approval_status' => 'rejected']);

        return back()->with('status', 'Trader rejected.');
    }
}
