<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'benefactor_id',
        'donation_amount',
        'campaign_id'
    ];

    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
}
