<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function merchant() {
        return $this->belongsTo(User::class, 'merchant_id');
    }

    public function affiliateLinks() {
        return $this->hasMany(AffiliateLink::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

}
