<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'package_product', 'package_id', 'product_id')->withTimestamps();
    }
}
