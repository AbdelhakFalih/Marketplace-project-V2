<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'offer_id',
        'buyer_id',
        'seller_id',
        'quantity',
        'unit_price',
        'amount',
        'status',
    ];

    public function offer()
    {
        return $this->belongsTo(Offre::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
