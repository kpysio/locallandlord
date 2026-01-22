<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'landlord_id',
        'name',
        'address',
        'type',
        'rent_amount',
        'bedrooms',
        'bathrooms',
        'description',
        'status',
    ];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }
}
