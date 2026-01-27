<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TraderApprovalController;
use App\Http\Controllers\Admin\TraderListController;
use App\Http\Controllers\Landlord\LandlordDashboardController;
use App\Http\Controllers\Landlord\PropertyController;
use App\Http\Controllers\Landlord\TraderListController as LandlordTraderListController;
use App\Http\Controllers\TraderProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Trader routes
Route::middleware(['auth', 'role:trader'])->prefix('trader')->name('trader.')->group(function () {
    Route::get('/dashboard', function () {
        return view('trader.dashboard');
    })->name('dashboard');

    Route::get('/profile', [TraderProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [TraderProfileController::class, 'update'])->name('profile.update');

    Route::get('/trade-category', function () {
        return view('trader.services');
    })->name('trade-category');

    Route::get('/trade-location', function () {
        return view('trader.locations');
    })->name('trade-location');

    Route::get('/jobs', function () {
        $jobs = [
            ['title' => 'Interior painting for 2-bed flat', 'area' => 'Barnet', 'budget' => '£1,200', 'status' => 'New'],
            ['title' => 'Bathroom renovation', 'area' => 'Stanmore', 'budget' => '£3,500', 'status' => 'Shortlisted'],
            ['title' => 'Carpentry – built-in wardrobes', 'area' => 'Ashford', 'budget' => '£2,000', 'status' => 'In discussion'],
        ];

        return view('trader.jobs', compact('jobs'));
    })->name('jobs');
});

// Landlord routes
Route::middleware(['auth', 'role:landlord'])->prefix('landlord')->name('landlord.')->group(function () {
    Route::get('/dashboard', [LandlordDashboardController::class, 'index'])->name('dashboard');
    Route::resource('properties', PropertyController::class);
    Route::get('/traders', [LandlordTraderListController::class, 'index'])->name('traders.index');
});

// Admin routes: trader list & approval
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/traders', [TraderListController::class, 'index'])->name('admin.traders.index');
    Route::post('/admin/traders/{trader}/approve', [TraderApprovalController::class, 'approve'])->name('admin.traders.approve');
    Route::post('/admin/traders/{trader}/reject', [TraderApprovalController::class, 'reject'])->name('admin.traders.reject');
});

require __DIR__.'/auth.php';
