<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'approval_status',
        'business_name',
        'phone',
        'plan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tradeCategories()
    {
        return $this->belongsToMany(TradeCategory::class, 'trader_trade_category');
    }

    public function tradeLocations()
    {
        return $this->belongsToMany(TradeLocation::class, 'trader_trade_location');
    }

    public function isApproved(): bool
    {
        return $this->approval_status === 'approved';
    }
}
