<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    public function affiliateLink() {
        return $this->belongsTo(AffiliateLink::class);
    }

    public function affiliate() {
        return $this->belongsTo(User::class, 'affiliate_id');
    }
}
