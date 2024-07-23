<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * Get the booker that owns the code.
     */
    public function booker()
    {
        return $this->belongsToMany(Booker::class);
    }
}
