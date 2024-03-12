<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'affiliate_id',
        'link'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'affiliate_id');
    }

    public function clicks() {
        return $this->hasMany(Click::class);
    }

    public function purchaseRecords() {
        return $this->hasMany(PurchaseRecord::class, 'affiliate_id');
    }

    public function getTotalSalesAttribute()
    {
        return $this->purchaseRecords()->sum('total_price');
    }
}
