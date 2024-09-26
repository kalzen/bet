<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booker extends Model
{
    protected $guarded = [];
    use HasFactory;

    /**
     * Get the codes associated with the booker.
     */
    public function codes()
    {
        return $this->hasMany(Code::class, 'booker_id');
    }

    public function categories()
    {
        return $this->belongsToMany(BookerCategory::class, 'bookers_categories');
    }
}
