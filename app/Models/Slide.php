<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = [];

    public function langs()
    {
        return $this->belongsTo(Lang::class,'lang_id');
    }

    public function langParent()
    {
        return $this->belongsTo(Slide::class,'lang_parent_id');
    }

    public function langChildren()
    {
        return $this->hasMany(Slide::class,'lang_parent_id');
    }

}
