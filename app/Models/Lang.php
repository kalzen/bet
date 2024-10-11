<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Lang extends Model
{
    use SoftDeletes;

    protected $table = 'langs';

    protected $fillable = ['name', 'locale'];
    
    protected $guarded = [];

    public function bookers()
    {
        return $this->hasMany(Booker::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // public function except(Collection $exception)
    // {
    //     $allLangs = Lang::all();
    //     dd($allLangs);
    // }
}
