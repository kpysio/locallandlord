<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function traders()
    {
        return $this->belongsToMany(Trader::class, 'trader_trade_category');
    }
}

