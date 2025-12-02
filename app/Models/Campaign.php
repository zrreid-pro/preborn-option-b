<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'campaign_name',
        'total_donations',
        'donation_goal'
    ];

    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

    public function donations() {
        return $this->hasMany(Donation::class);
    }
}
